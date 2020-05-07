$(document).ready(function () {
  $(".contact__form").submit(function () {
      var formID = $(this).attr('id');
      var formNm = $('#' + formID);
      var message = $(formNm).find(".form-message");
      var formTitle = $(formNm).find(".form-title");
      var formContent = $(formNm).find(".contact__form-wrap");
      var formBtn = $(formNm).find(".contact__form-btn");
      $.ajax({
          type: "POST",
          url: 'http://form.okshimel.in.ua/telegram.php',
          data: formNm.serialize(),
          success: function (data) {
            // Вывод сообщения об успешной отправке
            formContent.css("display", "none");
            formBtn.css("display", "none");
            message.html(data);
            setTimeout(function(){
              message.css("display","none");
              formContent.css("display", "block");
              formBtn.css("display", "block");
              formTitle.css("display","block");
              $('input').not(':input[type=submit], :input[type=hidden]').val('');
              $("textarea").val("");
            }, 3000);
          },
          error: function (jqXHR, text, error) {
              // Вывод сообщения об ошибке отправки
              formContent.css("display", "none");
              formBtn.css("display", "none");
              message.html(error);
              setTimeout(function(){
                message.css("display","none");
                formContent.css("display", "block");
                formBtn.css("display", "block");
                formTitle.css("display","block");
                $('input').not(':input[type=submit], :input[type=hidden]').val('');
                $("textarea").val("");
              }, 3000);
          }
      });
      return false;
  });
});