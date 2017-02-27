/**
 * Khai báo biến toàn cục
 */
var progressbar = $('#progressbar');
var percent = $('#percent');
var result = $('#result');
var percentValue = "0%";

$('#formUploadPest').ajaxForm({
      // Do something before uploading
      beforeUpload: function() {
        result.empty();
        percentValue = "0%";
        progressbar.width = percentValue;
        percent.html(percentValue);
      },
       
      // Do somthing while uploading
      uploadProgress: function(event, position, total, percentComplete) {
        var percentValue = percentComplete + '%';
        progressbar.width(percentValue);
        percent.html(percentValue);
      },
       
      // Do something while uploading file finish
      success: function() {
        var percentValue = '100%';
        progressbar.width(percentValue);
        percent.html(percentValue);
      },
       
      // Add response text to div #result when uploading complete
      complete: function(xhr) {
        $('#formUploadPest .alert').removeClass('hidden');
        $('#formUploadPest .alert').html(xhr.responseText);
      }
  });

// submit form upload ảnh
$('#formUploadImg').ajaxForm({
      // Do something before uploading
      beforeUpload: function() {
        result.empty();
        percentValue = "0%";
        progressbar.width = percentValue;
        percent.html(percentValue);
      },
       
      // Do somthing while uploading
      uploadProgress: function(event, position, total, percentComplete) {
        var percentValue = percentComplete + '%';
        progressbar.width(percentValue);
        percent.html(percentValue);
      },
       
      // Do something while uploading file finish
      success: function() {
        var percentValue = '100%';
        progressbar.width(percentValue);
        percent.html(percentValue);
      },
       
      // Add response text to div #result when uploading complete
      complete: function(xhr) {
        $('#formUploadImg .alert').removeClass('hidden');
        $('#formUploadImg .alert').html(xhr.responseText);
      }
  });

// bắt sự kiện open file từ client
$('#formOpenPest').ajaxForm({
      // Do something before uploading
      beforeUpload: function() {
        result.empty();
        percentValue = "0%";
        progressbar.width = percentValue;
        percent.html(percentValue);
      },
       
      // Do somthing while uploading
      uploadProgress: function(event, position, total, percentComplete) {
        var percentValue = percentComplete + '%';
        progressbar.width(percentValue);
        percent.html(percentValue);
      },
       
      // Do something while uploading file finish
      success: function() {
        var percentValue = '100%';
        progressbar.width(percentValue);
        percent.html(percentValue);
      },
       
      // Add response text to div #result when uploading complete
      complete: function(xhr) {
        $('#formOpenPest .alert').removeClass('hidden');
        $('.question').html(xhr.responseText);
        load_question();
      }
  });
// bắt sự kiện show modal

// bắt sự kiện form ẩn đi
$('#modalUpload').on('hidden.bs.modal',function(){
  $('#modalUpload .rs').click();
  $('#modalUpload .alert').addClass('hidden');
  $('#modalUpload .progress-bar').css('width', '0');
  percent.html('0%');
})