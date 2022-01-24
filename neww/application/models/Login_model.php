<?php

class Login_model extends CI_Model
{
    var $Type = '';

    function Login()
    {
        $CheckingString = '';

        $UIDField = '';
        $deleteFlagField = '';
        $table = '';
        $orderByTable = '';
        $orderByField = '';
        $orderByType = '';
        $groupByTable = '';
        $groupByField = '';

        $dbID = '';
        $dbUID = '';
        $dbName = '';
        $dbPassword = '';
        $dbActiveFlag = false;

        $login_uid = '';
        $login_password = '';
        $result = array();

                $login_uid = $this->input->post('user_email');
                $login_password = $this->input->post('user_pass_login');




            $UIDField = 'user_name';
            $table = 'Wo_Users';
            $orderByTable = 'Wo_Users';
            $orderByField = 'user_id';
            $orderByType = 'ASC';
            $groupByTable = 'Wo_Users';
            $groupByField = 'user_id';



        $this->db->select('*');
        $this->db->where($UIDField, $login_uid);
         $this->db->where('admin_approval', 1);
         $this->db->where('email_verify', 1);
        $this->db->where('user_status', 'Active');
        $this->db->order_by($orderByTable . '.' . $orderByField, $orderByType);
        $this->db->group_by($groupByTable . '.' . $groupByField);
        $query = $this->db->get($table)->row();
        if ($query != null) {

                $dbID = $query->user_id;
                $dbUID = $query->user_id;
                $dbName = $query->user_name;
                $dbPassword = $query->password;
                $dbActiveFlag = $query->user_status;

            if ($login_password == $dbPassword) {
                if ($dbActiveFlag == "Active") {

                    $result['Status'] = LOGIN_SUCCESS;
                    $result['Data'] = $query;

                    $_SESSION['login_flag'] = YES;

                } elseif ($dbActiveFlag == NO) {
                    $result['Status'] = LOGIN_FAILED;
                    $result['ErrorCode'] = ACCOUNT_INACTIVE;
                    $_SESSION['login_flag'] = NO;
                }
                return $result;
            } else {

                $result['Status'] = LOGIN_FAILED;
                $result['ErrorCode'] = WRONG_PASSWORD;
                $_SESSION['login_flag'] = NO;
                return $result;
            }
        } else {
            $result['Status'] = LOGIN_FAILED;
            $result['ErrorCode'] = WRONG_CREDENTIALS;
            $_SESSION['login_flag'] = NO;
            return $result;
        }

    }

    function Token($LoginID, $LoginFN, $LoginUID, $LoginType, $Device)
    {
        $CreatedOn = date('Y-m-d H:i:s');
        $Token = urlencode(password_hash($LoginFN . $LoginUID . $CreatedOn, PASSWORD_BCRYPT, ['cost' => 9]));
        $data = array
        (
            'FKLoginID' => $LoginID,
            'LoginDevice' => $Device,
            'LoginToken' => $Token,
            'LoginType' => $LoginType,
            'LoginTime' => $CreatedOn,
            'LastActiveTime' => $CreatedOn,
            'LoginFlag' => 1
        );
        if ($this->db->insert('log_login_tokens', $data)) {
            $this->db->select('*');
            $this->db->from('log_login_tokens');
            $this->db->where('LoginToken', $Token);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->result();
        }
    }

    function getTokenDetails($Token)
    {
        $this->db->select('*');
        $this->db->from('log_login_tokens');
        $this->db->where('LoginToken', $Token);
        $this->db->limit(1);
        $query = $this->db->get()->row();
        return $query;
    }

    function TokenTimeExpirationCheck($Token)
    {
        $LastTime = '';
        $UpdatedOn = date('Y-m-d H:i:s');
        $this->db->select('LastActiveTime');
        $this->db->from('log_login_tokens');
        $this->db->where('LoginToken', $Token);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $LastTime = $row->LastActiveTime;
            }
            $TimeDifference = round(abs(strtotime($UpdatedOn) - strtotime($LastTime)) / MINUTE, 2);
            if ($TimeDifference <= (DAY * DEFAULT_TOKEN_VALIDITY_DAYS)) {
                $data = array
                (
                    'LastActiveTime' => $UpdatedOn
                );
                $this->db->where('LoginToken', $Token);
                $this->db->update('log_login_tokens', $data);
                return TOKEN_VALID;
            } else {
                return TOKEN_INVALID;
            }
        } else {
            return TOKEN_NOT_FOUND;
        }
    }

    function TokenChangeOnLogout($Token)
    {
        $TTE = $this->TokenTimeExpirationCheck($Token);
        if ($TTE == TOKEN_VALID) {
            $this->db->delete('log_login_tokens', array('LoginToken' => $Token));
            return TOKEN_DELETED;
        } else {
            return TOKEN_NOT_DELETED;
        }
    }


    /*----Image Functions Starts----*/
    function resizeImage($resourceType, $image_width, $image_height, $uploadImageType = '')
    {
        if ($image_width > $image_height) {
            if ($image_width > UPLOAD_IMAGE_MAX_WIDTH) {
                $resizeWidth = UPLOAD_IMAGE_MAX_WIDTH;
                $resizeHeight = ($image_height / $image_width) * $resizeWidth;
            } else {
                $resizeWidth = $image_width;
                $resizeHeight = $image_height;
            }
        } else {
            if ($image_height > UPLOAD_IMAGE_MAX_HEIGHT) {
                $resizeHeight = UPLOAD_IMAGE_MAX_HEIGHT;
                $resizeWidth = ($image_width / $image_height) * $resizeHeight;
            } else {
                $resizeWidth = $image_width;
                $resizeHeight = $image_height;
            }
        }
        $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
        if ($uploadImageType == IMAGETYPE_PNG) {
            imagealphablending($imageLayer, false);
            imagesavealpha($imageLayer, true);
            $transparent = imagecolorallocatealpha($imageLayer, 255, 255, 255, 127);
            imagefilledrectangle($imageLayer, 0, 0, $resizeWidth, $resizeHeight, $transparent);
        }
        imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
        return $imageLayer;
    }

    function upload_resize_image($tempFile = '', $fullUploadPath = '')
    {
        $imageProcess = false;
        $file = null;
        $sourceProperties = getimagesize($tempFile);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = @imagecreatefromjpeg($tempFile);
                $imageLayer = $this->resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                $file = imagejpeg($imageLayer, $fullUploadPath);
                break;

            case IMAGETYPE_GIF:
                $resourceType = @imagecreatefromgif($tempFile);
                $imageLayer = $this->resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                $file = imagegif($imageLayer, $fullUploadPath);
                break;

            case IMAGETYPE_PNG:
                $resourceType = @imagecreatefrompng($tempFile);
                $imageLayer = $this->resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $uploadImageType);
                $file = imagepng($imageLayer, $fullUploadPath);
                break;

            default:
                $imageProcess = false;
                break;
        }

        $imageProcess = move_uploaded_file($file, $fullUploadPath);
        return $imageProcess;
    }
    /*----Image Functions Ends----*/
}

?>