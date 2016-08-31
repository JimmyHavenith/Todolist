(function($)
{

  $(document).ready(function()
  {

    var menu = $('header');
    var heightBanner = $('.home-b').height() - 50;

    $(window).scroll(function()
    {
      var scrollOffsetTop = $(window).scrollTop();
      if(scrollOffsetTop >= heightBanner){
        $('header').css('background-color', '#1a8c8e');
        $('header').css('transition', '0.5s');
      } else if (scrollOffsetTop < heightBanner) {
        $('header').css('background-color', 'transparent');
        $('header').css('transition', '0.5s');
      }
    });

    // Delete task
    $('.task-item-delete').click(function(e){
      e.preventDefault();
      var delete_url = e.currentTarget.href+'/ajax';
      var blockParent = $(this).parent().parent();
      $.ajax({
        type: "GET",
        url: delete_url,
        success: function(){
          blockParent.fadeOut('slow', function() {
            $(this).remove();
          })
        }
      })
    });

    // Check task
    $('.check-task-box').change(function() {
      if( this.checked == true ){
        var elementCheck = $(this).parent();
        var idCheck = $(this).attr('id');
        var that = $(this);
        $.ajax({
          type: "GET",
          url: 'checkSingle/' + idCheck,
          success: function(){
            $(that).addClass('completed');
            $('.checked-task-group').append(elementCheck);
          }
        })
      } else {
        var elementCheck = $(this).parent();
        var idCheck = $(this).attr('id');
        var that = $(this);
        $.ajax({
          type: "GET",
          url: 'uncheckSingle/' + idCheck,
          success: function(){
            $(that).removeClass('completed');
            $('.unchecked-task-group').append(elementCheck);
          }
        })
      }
    });

    $('.task-done-submit').css('display', 'none');

    // See task
    $('.task-item-see').click(function(e) {
      e.preventDefault();
      var taskList = $(this).parent().parent().children('.tasks-item-infos');
      if(taskList.css('display') == 'block'){
        taskList.css('display', 'none');
      } else{
        taskList.css('display', 'block');
      }
    });

    //Edit name task
    $('.tasks-item-name').click(function(e){
      var value = $(this).text();
      $(this).replaceWith('<input id="tasks-change-id" class="tasks-change-name" type="text" value="'+value+'">');
      $("#tasks-change-id").focus();
    });

    // prevent form
    $('.sendForm').submit( function(e) {
      e.preventDefault();
      var idTask = $('#tasks-change-id').parent().children('.check-task-box').attr('id');
      var text = $('#tasks-change-id').val();
      $.ajax({
        type: "GET",
        url: 'tasksName/' + idTask,
        data: 'text=' + text,
        success: function(){
          $('#tasks-change-id').replaceWith('<span class="tasks-item-name">'+text+'</span>');
        }
      })
    });

    $(document).on("focusout","#tasks-change-id",function(e){
      var value = $(this).val();
      $(this).replaceWith('<span class="tasks-item-name">'+value+'</span>');
    });



    // Change project name
    $('.project-name-change-icon').click(function(e){
      e.preventDefault();
      var value = $(this).parent().children('.project-name-change').children('span').text();
      var id = $(this).parent().attr('id');

      $(this).parent().children('.project-name-change').replaceWith('<input id="project-change-id" class="project-change-name" type="text" value="'+value+'">');
      $("#project-change-id").focus();

      $("#project-change-id").keypress( function(e) {
        if( e.keyCode == 13 ) {
          var text = $('#project-change-id').val();
          $.ajax({
            type: "GET",
            url: 'projectsName/' + id,
            data: 'text=' + text,
            success: function(){
              $('#project-change-id').replaceWith('<a href="http://localhost/projects/" class="project-show project-name-change"><img alt="" src="/img/icon-project.png"><span class="project-name-change-content">'+text+'</span></a>');
            }
          })
        }
      } );

    });


    //Edit description task
    $('.task-infos-p').click(function(e){
      var value = $(this).text();
      $(this).replaceWith('<textarea id="tasks-change-desc" class="tasks-change-desc">'+value+'</textarea>');
      console.log(value);
      $("#tasks-change-desc").focus();
    });

    // prevent form
    $('.sendFormDesc').submit( function(e) {
      e.preventDefault();
      var idTaskDesc = $('#tasks-change-desc').parent().parent().parent().parent().children('.check-task-box').attr('id');
      var text = $('#tasks-change-desc').val();
      console.log(text);
      $.ajax({
        type: "GET",
        url: 'descriptionName/' + idTaskDesc,
        data: 'text=' + text,
        success: function(){
          $('#tasks-change-desc').replaceWith('<div class="task-infos"><p>'+text+'</p></div>');
        }
      })
    });

    $(document).on("focusout","#tasks-change-desc",function(e){
      var value = $(this).val();
      $(this).replaceWith('<div class="task-infos"><p>'+value+'</p></div>');
    });




  });
})(jQuery);
