$(function() {
$( "#tabs" ).tabs();
});


/* $(document).on('click', '.nav-list li', function() {
       $(".nav-list li").removeClass("active");
       $(this).addClass("active");
   });*/
$(document).ready(function() {

   var url = window.location;
    // Will only work if string in href matches with location
        $('ul.nav a[href="' + url + '"]').parent().addClass('active');
       $(".nav li").removeClass("active");

    // Will also work for relative and absolute hrefs
        $('ul.nav a').filter(function () {
            return this.href == url;
        }).parent().addClass('active').parent().parent().addClass('active');
 

$('#search').submit(function() { // catch the form's submit event
  if ($('input').val() === " ") {
                $('#searchResult p').html("لا يمكن البحث الحقل فارغ");
                return false;
            }
            else{
    $.ajax({ // create an AJAX call...
        
        data: $(this).serialize(), // get the form data
        type: $(this).attr('method'), // GET or POST
        url: $(this).attr('action'), // the file to call
        success: function(response) { // on success..
            $('#searchResult').html(response); // update the DIV
            //$("#searchResult").css("overflow-y","scroll");
        }
    });
    return false; 
    }// cancel original event to prevent form submitting
});

  $('#addagen').submit(function() { // catch the form's submit event
     if ($('input').val().replace(/\s+/g, '') == " " ) {
                $('#addResult p').html("لايمكن اضافة حقل فارغ");
                return false;
            }
     else{
        $.ajax({ // create an AJAX call...
            
            data: $(this).serialize(), // get the form data
            type: $(this).attr('method'), // GET or POST
            url: $(this).attr('action'), // the file to call
            success: function(response) { // on success..
                $('#addResult').html(response); // update the DIV
                //$("#searchResult").css("overflow-y","scroll");
            }
        });
  }
    return false; // cancel original event to prevent form submitting
  });

    $('#update').submit(function() { // catch the form's submit event
     if ($('input').val() === " ") {
                $('#addResult p').html("لايمكن التعديل الحقل فارغ");
                return false;
            }
            else{
              return true;
    }
    return false; // cancel original event to prevent form submitting
  });
 




	$("#OldAgenSearch").autocomplete({
    source: OldAgenArray
  });

    $("#NewAgenSearch").autocomplete({
      source: NewAgenArray
    });

    $("#ComRetrSearch").autocomplete({
      source: ComRetrArray
    });

    $("#ParRetrSearch").autocomplete({
      source: ParRetrArray
    });

     $("#BuildingsSearch").autocomplete({
      source: BuildingsArray
    });

      $("#CasesSearch").autocomplete({
      source: CasesArray
    });

});
