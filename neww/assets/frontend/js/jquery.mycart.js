/*
* jQuery myCart - v1.0 - 2016-04-21
* http://asraf-uddin-ahmed.github.io/
* Copyright (c) 2016 Asraf Uddin Ahmed; Licensed None
*/

(function ($) {

    "use strict";

    var OptionManager = (function () {
        var objToReturn = {};

        var defaultOptions = {
            classCartIcon: 'my-cart-icon',
            classCartBadge: 'my-cart-badge',
            classDishQuantity: 'my-dish-quantity',
            classDishRemove: 'my-dish-remove',
            classCheckoutCart: 'my-cart-checkout',
            affixCartIcon: true,
            showCheckoutModal: true,
            clickOnAddToCart: function ($addTocart) {
            },
            clickOnCartIcon: function ($cartIcon, dish, totalPrice, totalQuantity) {
            },
            checkoutCart: function (dish, totalPrice, totalQuantity) {
            },
            getDiscountPrice: function (dish, totalPrice, totalQuantity) {
                return null;
            }
        };


        var getOptions = function (customOptions) {
            var options = $.extend({}, defaultOptions);
            if (typeof customOptions === 'object') {
                $.extend(options, customOptions);
            }
            return options;
        }

        objToReturn.getOptions = getOptions;
        return objToReturn;
    }());


    var DishManager = (function () {
        var objToReturn = {};

        /*
        PRIVATE
        */
        localStorage.dish = localStorage.dish ? localStorage.dish : "";
        var getIndexOfDish = function (id) {
            var dishIndex = -1;
            var dish = getAllDishs();
            $.each(dish, function (index, value) {
                if (value.id == id) {
                    dishIndex = index;
                    return;
                }
            });
            return dishIndex;
        }
        var setAllDishs = function (dish) {
            localStorage.dish = JSON.stringify(dish);
        }
        var addDish = function (id, name, summary, price, quantity, image) {
            var dish = getAllDishs();
            dish.push({
                id: id,
                name: name,
                summary: summary,
                price: price,
                quantity: quantity,
                image: image
            });
            setAllDishs(dish);
        }

        /*
        PUBLIC
        */
        var getAllDishs = function () {

            try {
                var dish = JSON.parse(localStorage.dish);
                return dish;
            } catch (e) {
                return [];
            }
        }
        var updatePoduct = function (id, quantity) {
            var dishIndex = getIndexOfDish(id);
            if (dishIndex < 0) {
                return false;
            }
            var dish = getAllDishs();
            dish[dishIndex].quantity = typeof quantity === "undefined" ? dish[dishIndex].quantity * 1 + 1 : quantity;
            setAllDishs(dish);
            return true;
        }
        var setDish = function (id, name, summary, price, quantity, image) {
            if (typeof id === "undefined") {
                console.error("id required")
                return false;
            }
            if (typeof name === "undefined") {
                console.error("name required")
                return false;
            }
            if (typeof image === "undefined") {
                console.error("image required")
                return false;
            }
            if (!$.isNumeric(price)) {
                console.error("price is not a number")
                return false;
            }
            if (!$.isNumeric(quantity)) {
                console.error("quantity is not a number");
                return false;
            }
            summary = typeof summary === "undefined" ? "" : summary;

            if (!updatePoduct(id)) {
                addDish(id, name, summary, price, quantity, image);
            }
        }
        var clearDish = function () {
            setAllDishs([]);
        }
        var removeDish = function (id) {
            var dish = getAllDishs();
            dish = $.grep(dish, function (value, index) {
                return value.id != id;
            });
            setAllDishs(dish);
        }
        var getTotalQuantity = function () {
            var total = 0;
            var dish = getAllDishs();
            $.each(dish, function (index, value) {
                total += value.quantity * 1;
            });
            return total;
        }
        var getTotalPrice = function () {
            var dish = getAllDishs();
            var total = 0;
            $.each(dish, function (index, value) {
                total += value.quantity * value.price;
            });
            return total;
        }

        objToReturn.getAllDishs = getAllDishs;
        objToReturn.updatePoduct = updatePoduct;
        objToReturn.setDish = setDish;
        objToReturn.clearDish = clearDish;
        objToReturn.removeDish = removeDish;
        objToReturn.getTotalQuantity = getTotalQuantity;
        objToReturn.getTotalPrice = getTotalPrice;
        return objToReturn;
    }());


    var loadMyCartEvent = function (userOptions) {

        var options = OptionManager.getOptions(userOptions);
        var $cartIcon = $("." + options.classCartIcon);
        var $cartBadge = $("." + options.classCartBadge);
        var classDishQuantity = options.classDishQuantity;
        var classDishRemove = options.classDishRemove;
        var classCheckoutCart = options.classCheckoutCart;

        var idCartModal = 'my-cart-modal';
        var idCartTable = 'my-cart-table';
        var idGrandTotal = 'my-cart-grand-total';
        var idEmptyCartMessage = 'my-cart-empty-message';
        var idDiscountPrice = 'my-cart-discount-price';
        var classDishTotal = 'my-dish-total';
        var classAffixMyCartIcon = 'my-cart-icon-affix';

       // $cartBadge.text(DishManager.getTotalQuantity());

        if (!$("#" + idCartModal).length) {
          /*  $('body').append(
                '<div class="modal fade" id="' + idCartModal + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</h4>' +
                '</div>' +
                '<div class="modal-body">' +
                '<table class="table table-hover table-responsive" id="' + idCartTable + '"></table>' +
                '</div>' +
                '<div class="modal-footer">' +
                '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                '<button onClick="checkout_redirect();" type="button"  class="btn btn-primary" data-dismiss="modal">CheckOut</button>' +

                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
            );*/
        }

        var drawTable = function () {

            var $cartTable = $("#" + idCartTable);
            $cartTable.empty();

            var dish = DishManager.getAllDishs();
            $.each(dish, function () {
                var total = this.quantity * this.price;
                var cartID = readCookie('PKcartID_' + this.id + '');
// delete cookie here
              /*  $cartTable.append(
                    '<tr title="' + this.summary + '" data-id="' + this.id + '" data-price="' + this.price + '">' +
                    '<td class="text-center" style="width: 30px;"><img width="30px" height="30px" src="' + this.image + '"/></td>' +
                    '<td>' + this.name + '</td>' +
                    '<td title="Unit Price">$' + this.price + '</td>' +
                    '<td title="Quantity"><input type="number" min="1" onchange="change_cartQty(this.value,' + cartID + ',' + this.price + ');" id="cartQuantity_' + this.id + '" style="width: 70px;" class="' + classDishQuantity + '" value="' + this.quantity + '"/></td>' +
                    '<td title="Total" class="' + classDishTotal + '">$' + total + '</td>' +
                    '<td title="Remove from Cart" class="text-center" style="width: 30px;" onclick="remove_Cartitem(' + cartID + ');"><input type="hidden" value="' + cartID + '" id="PKcartID_' + this.id + '"> <a href="javascript:void(0);" class="btn btn-xs btn-danger ' + classDishRemove + '">X</a></td>' +
                    '</tr>'
                );*/
            });

          /*  $cartTable.append(dish.length ?
                '<tr>' +
                '<td></td>' +
                '<td><strong>Total</strong></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td><strong id="' + idGrandTotal + '">$</strong></td>' +
                '<td></td>' +
                '</tr>'
                : '<div class="alert alert-danger" role="alert" id="' + idEmptyCartMessage + '">Your cart is empty</div>'
            );*/

           /* var discountPrice = options.getDiscountPrice(dish, DishManager.getTotalPrice(), DishManager.getTotalQuantity());
            if (dish.length && discountPrice !== null) {
                $cartTable.append(
                    '<tr style="color: red">' +
                    '<td></td>' +
                    '<td><strong>Total (including discount)</strong></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td><strong id="' + idDiscountPrice + '">$</strong></td>' +
                    '<td></td>' +
                    '</tr>'
                );
            }*/

          //  showGrandTotal();
            showDiscountPrice();
        }
        var showModal = function () {
            drawTable();
            $("#" + idCartModal).modal('show');
        }
        var updateCart = function () {
            $.each($("." + classDishQuantity), function () {
                var id = $(this).closest("tr").data("id");
                DishManager.updatePoduct(id, $(this).val());
            });
        }
        var showGrandTotal = function () {
            $("#" + idGrandTotal).text("$" + DishManager.getTotalPrice());
        }
        var showDiscountPrice = function () {
            $("#" + idDiscountPrice).text("Rs" + getTotalPrice);
        }

        /*
        EVENT
        */
        if (options.affixCartIcon) {
            var cartIconBottom = $cartIcon.offset().top * 1 + $cartIcon.css("height").match(/\d+/) * 1;
            var cartIconPosition = $cartIcon.css('position');
            $(window).scroll(function () {
                if ($(window).scrollTop() >= cartIconBottom) {
                    $cartIcon.css('position', 'fixed').css('z-index', '999').addClass(classAffixMyCartIcon);
                } else {
                    $cartIcon.css('position', cartIconPosition).css('background-color', 'inherit').removeClass(classAffixMyCartIcon);
                }
            });
        }

       /* $cartIcon.click(function () {
            alert("Sdfgdfg")
           // options.showCheckoutModal ? showModal() : options.clickOnCartIcon($cartIcon, DishManager.getAllDishs(), DishManager.getTotalPrice(), DishManager.getTotalQuantity());
        });
*/
        $(document).on("input", "." + classDishQuantity, function () {
            var price = $(this).closest("tr").data("price");
            var id = $(this).closest("tr").data("id");
            var quantity = $(this).val();

            $(this).parent("td").next("." + classDishTotal).text("$" + price * quantity);
            DishManager.updatePoduct(id, quantity);

           // $cartBadge.text(DishManager.getTotalQuantity());
          //  showGrandTotal();
            showDiscountPrice();
        });

        $(document).on('keypress', "." + classDishQuantity, function (evt) {
            if (evt.keyCode == 38 || evt.keyCode == 40) {
                return;
            }
            evt.preventDefault();
        });

     /*   $(document).on('click', "." + classDishRemove, function () {
            alert("dfgdfg"); exit;
            var $tr = $(this).closest("tr");
            var id = $tr.data("id");
            $tr.hide(500, function () {
                DishManager.removeDish(id);
                drawTable();
               // $cartBadge.text(DishManager.getTotalQuantity());
            });
        });*/

        $("." + classCheckoutCart).click(function () {
            var dish = DishManager.getAllDishs();
            if (!dish.length) {
                $("#" + idEmptyCartMessage).fadeTo('fast', 0.5).fadeTo('fast', 1.0);
                return;
            }
            updateCart();
            options.checkoutCart(DishManager.getAllDishs(), DishManager.getTotalPrice(), DishManager.getTotalQuantity());
            DishManager.clearDish();
          // $cartBadge.text(DishManager.getTotalQuantity());
            $("#" + idCartModal).modal("hide");
        });

    }


    var MyCart = function (target, userOptions) {
        /*
        PRIVATE
        */
        var $target = $(target);
        var options = OptionManager.getOptions(userOptions);
        var $cartIcon = $("." + options.classCartIcon);
        var $cartBadge = $("." + options.classCartBadge);

        /*
        EVENT
        */
        $target.click(function () {
            options.clickOnAddToCart($target);

            var id = $target.data('id');
            var name = $target.data('name');
            var summary = $target.data('summary');
            var price = $target.data('price');
            var quantity = $target.data('quantity');
            var image = $target.data('image');

            DishManager.setDish(id, name, summary, price, quantity, image);
          //  $cartBadge.text(DishManager.getTotalQuantity());
        });

    }


    $.fn.myCart = function (userOptions) {
        loadMyCartEvent(userOptions);
        return $.each(this, function () {
            new MyCart(this, userOptions);
        });
    }


})(jQuery);
