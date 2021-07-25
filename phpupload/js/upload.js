"use strict"; // JSLint/JSHint

// Private methods

var app = app || {};
(function(o) {
    var ajax, getFormData, setProgress;

    ajax = function(data) {
        //console.log(data);
        var xmlhttp = new XMLHttpRequest();
        var uploaded;

        xmlhttp.addEventListener('readystatechange', function() {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    uploaded = JSON.parse(this.response);
                    //console.log(uploaded);
                    if (typeof o.options.finished === 'function') {
                        o.options.finished(uploaded);
                    }
                } else if (typeof o.options.error === 'function') {
                    o.options.error();
                }
            }
        });

        // Progress bar event
        xmlhttp.upload.addEventListener('progress', function(e) {
            //console.log(event);
            var percent;

            if (e.lengthComputable) {
                percent = Math.round((e.loaded / e.total) * 100);
                //console.log(percent);
                setProgress(percent);
            }
        });

        xmlhttp.open('post', o.options.processor);
        xmlhttp.send(data);
    };

    getFormData = function(source) {
        //console.log(source);
        var data = new FormData();

        for (var i = 0; i < source.length; i++) {
            data.append('files[]', source[i]);
        }

        return data;
    };

    setProgress = function(value) {
        //console.log(value);

        if (o.options.progressBar !== undefined) {
            o.options.progressBar.style.width = value ? value + '%' : 0;
        }

        if (o.options.progressText !== undefined) {
            o.options.progressText.textContent = value ? value + '%' : '';
        }
    };

    o.uploader = function(options) {
        //console.log(options);
        o.options = options;

        if (o.options.files !== undefined) {
            ajax(getFormData(o.options.files));
        }
    };
}(app));
