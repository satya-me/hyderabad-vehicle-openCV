const download = document.querySelector('.download-btn');
const countdown = document.querySelector('.countdown');
const pleaseWaitText = document.querySelector('.pleaseWait-text');
const manualDownloadText = document.querySelector('.manualDownload-text');
const manualDownloadLink = document.querySelector('.manualDownload-link');
var timeLeft = 10;

download.addEventListener('click', () => {
  download.style.display = "none";
  countdown.innerHTML = `Download will begin automatically in <span>${timeLeft}</span> seconds`;
  
  var downloadTimer = setInterval(function timeCount() {
    timeLeft--;
    countdown.innerHTML = `Download will begin automatically in <span>${timeLeft}</span> seconds`;
    
    if (timeLeft <= 0) {
      clearInterval(downloadTimer);

      pleaseWaitText.style.display = "block";
      let download_href = "https://drive.google.com/uc?export=download&id=16rTAYacGftyvTG1q2Edxnr7fXlurJwGy";

      window.location.href = download_href;
      manualDownloadLink.href = download_href; 


      setTimeout(() => {
        pleaseWaitText.style.display = "none";
        manualDownloadText.style.display = "block";
      }, 1000);
    }
  }, 1000);
});