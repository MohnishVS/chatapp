var save = function () {
    var userid = $("#user_id").val();
    var recid = $("#rec_id").val();
    var message = $("#message").val();

      $.ajax({
        url: "/MessageController/messup",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
          user_id: userid,
          rec_id: recid,
          message: message,
        },
        success: function (response) {
         console.log("msg uploaded")
        },
      });
  };
