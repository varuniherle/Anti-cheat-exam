window.onload = function () {
    var constraints = { audio: false, video: { width: 500, height: 375 } };

    navigator.mediaDevices.getUserMedia(constraints)
        .then(function (mediaStream) {
            if (mediaStream) {
                var video = document.querySelector('video');
                video.srcObject = mediaStream;
                video.onloadedmetadata = function (e) {
                    video.play();
                };
            }
            else {
                window.alert("Unapologetic behaviour tested");
            }

        })
        .catch((err) => console.log(err.name))
}