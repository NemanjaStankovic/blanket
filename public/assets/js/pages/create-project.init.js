!function(o){function t(){this.$body=o("body")}t.prototype.init=function(){Dropzone.autoDiscover=!1,o('[data-plugin="dropzone"]').each(function(){var t=o(this).attr("action"),e=o(this).data("previewsContainer"),t={url:t},e=(e&&(t.previewsContainer=e),o(this).data("uploadPreviewTemplate"));e&&(t.previewTemplate=o(e).html()),o(this).dropzone(t)})},o.FileUpload=new t,o.FileUpload.Constructor=t}(window.jQuery),window.jQuery.FileUpload.init(),$('[data-toggle="select2"]').select2(),$('[data-toggle="flatpicker"]').flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d"});