const download = document.querySelector('.download-btn');
const countdown = document.querySelector('.countdown');
const pleaseWaitText = document.querySelector('.pleaseWait-text');
const manualDownloadText = document.querySelector('.manualDownload-text');
const manualDownloadLink = document.querySelector('.manualDownload-link');
var timeLeft = 5;

download.addEventListener('click', () => {
  download.style.display = "none";
  countdown.innerHTML = `Download will begin automatically in <span>${timeLeft}</span> seconds`;

  var downloadTimer = setInterval(function timeCount() {
    timeLeft--;
    countdown.innerHTML = `Download will begin automatically in <span>${timeLeft}</span> seconds`;

    if (timeLeft <= 0) {
      clearInterval(downloadTimer);

      pleaseWaitText.style.display = "block";
      // let download_href = "https://bucketofimage.s3.ap-northeast-1.amazonaws.com/2022-09-27/1664288760_cam-01_20.jpg";

      let d = new Date();
      $("#example").tableHTMLExport({
        type: 'csv',
        filename: 'count_report_' + d.getFullYear() + '-' + d.getMonth() + 1 + '-' + d.getDate() + '.csv'
      });

      // window.location.href = download_href;
      // manualDownloadLink.href = manual();


      setTimeout(() => {
        pleaseWaitText.style.display = "none";
        manualDownloadText.style.display = "block";
      }, 1000);
    }
  }, 1000);
});

manualDownloadLink.addEventListener('click', () => {
  let d = new Date();
  $("#example").tableHTMLExport({
    type: 'csv',
    filename: 'count_report_' + d.getFullYear() + '-' + d.getMonth() + 1 + '-' + d.getDate() + '.csv'
  });
});