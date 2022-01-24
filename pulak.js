
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/service-worker.js');
}


const btn=document.getElementById("btn1");
window.addEventListener('beforeinstallprompt', (event) => {
  console.log('👍', 'beforeinstallprompt', event);
  window.deferredPrompt=event;
});
btn.addEventListener('click', () => {
  console.log('👍', 'butInstall-clicked');
  const promptEvent = window.deferredPrompt;
  if (!promptEvent) {

    console.log("NA");
 
  }

  promptEvent.prompt();

  promptEvent.userChoice.then((result) => {
    console.log('👍', 'userChoice', result);
    
    window.deferredPrompt = null;

  });
});
window.addEventListener('appinstalled', (event) => {
  console.log('👍', 'appinstalled', event);
});
