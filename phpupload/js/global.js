"use strict"; // JSLint/JSHint

(function() {

    var dropZone = document.getElementById('drop-zone');
    var barFill = document.getElementById('bar-fill');
    var barFillText = document.getElementById('bar-fill-text');
    var uploadsFinished = document.getElementById('uploads-finished');

    var startUpload = function(files) {
        // console.log(files);
        app.uploader({
            files:        files,
            progressBar:  barFill,
            progressText: barFillText,
            processor:    'upload.php',

            finished: function(data) {
                //console.log(data);
                var uploadedElement;
                var uploadedAnchor;
                var uploadedStatus;

//                for (var x = 0; x < data.length; x++) {
//                    var currFile = data[x];
//                    //console.log(currFile);
//                    uploadedElement = document.createElement('div');
//                    uploadedElement.className = 'upload-console-upload';
//
//                    uploadedAnchor = document.createElement('a');
//                    uploadedAnchor.textContent = currFile.name;
//
//                    if (currFile.uploaded) {
//                        uploadedAnchor.href = 'uploads/' + currFile.file;
//                    }
//
//                    uploadedStatus = document.createElement('span');
//                    uploadedStatus.textContent = currFile.uploaded ? 'Uploaded' : 'Failed';
//
//                    uploadedElement.appendChild(uploadedAnchor);
//                    uploadedElement.appendChild(uploadedStatus);
//
//                    uploadsFinished.appendChild(uploadedElement);
//                }

                // Array.forEach
                data.forEach(function(o) {
                    //console.log(o);
                    uploadedElement = document.createElement('div');
                    uploadedElement.className = 'upload-console-upload';

                    uploadedAnchor = document.createElement('a');
                    uploadedAnchor.textContent = o.name;

                    if (o.uploaded) {
                        uploadedAnchor.href = 'uploads/' + o.file;
                    }

                    uploadedStatus = document.createElement('span');
                    uploadedStatus.textContent = o.uploaded ? 'Uploaded' : 'Failed';

                    uploadedElement.appendChild(uploadedAnchor);
                    uploadedElement.appendChild(uploadedStatus);

                    uploadsFinished.appendChild(uploadedElement);
                });

                // erase class "hidden"
                uploadsFinished.className = '';

            },

            error: function() {
                console.log('There was an error.');
            }
        });
    };

    // Standard form upload
    document.getElementById('standard-upload').addEventListener('click', function(e) {
        var standardUploadFiles = document.getElementById('standard-upload-files');
        //e.preventDefault();
        startUpload(standardUploadFiles);
    });

    // Drop functionality
    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-console-drop';
        // console.log(e);
        startUpload(e.dataTransfer.files);
    };

    dropZone.ondragover = function() {
        this.className = 'upload-console-drop drop';
        return false;
    };

    dropZone.ondragleave = function() {
        this.className = 'upload-console-drop';
        return false;
    };

}());
