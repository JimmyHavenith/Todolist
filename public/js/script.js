(function($)
{

  $(document).ready(function()
  {

    // Scroll menu
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

    // Menu hamburger
    if ( $(window).width() <= 768 ) {
      $('.menu-hb-button').click(function(e){
        if(parseInt($('.lists').css('left')) == 0){
          e.preventDefault();
          $('.lists').css('left', '-300px');
          $('.lists').css('transition', 'all 0.5s');
        } else{
          e.preventDefault();
          $('.lists').css('left', '0');
          $('.lists').css('transition', 'all 0.5s');
        }
      })
    }


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

    // Delete project
    $('.icon-project-delete').click(function(e){
      e.preventDefault();
      var delete_url = e.currentTarget.href+'/ajax';
      var blockParent = $(this).parent();
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
        console.log('ok');
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

    // Check task
    $('.check-task-box-tag').change(function() {
      if( this.checked == true ){
        console.log('ok');
        var elementCheck = $(this).parent();
        var idCheck = $(this).attr('id');
        var that = $(this);
        $.ajax({
          type: "GET",
          url: 'checkSingleTag/' + idCheck,
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
          url: 'uncheckSingleTag/' + idCheck,
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

    // See task done
    $('.checked-task-group').css('display', 'none');
    $('.tasks-done-title a').click(function(e) {
      e.preventDefault();
      var taskList = $('.checked-task-group');
      if(taskList.css('display') == 'block'){
        taskList.css('display', 'none');
      } else{
        taskList.css('display', 'block');
      }
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

    // Change project name
    $('.tag-name-change-icon').click(function(e){
      e.preventDefault();
      var value = $(this).parent().children('.tag-name-change').children('span').text();
      var id = $(this).parent().attr('id');

      $(this).parent().children('.tag-name-change').replaceWith('<input id="tag-change-id" class="tag-change-name" type="text" value="'+value+'">');
      $("#tag-change-id").focus();

      $("#tag-change-id").keypress( function(e) {
        if( e.keyCode == 13 ) {
          var text = $('#tag-change-id').val();
          $.ajax({
            type: "GET",
            url: 'tagsName/' + id,
            data: 'text=' + text,
            success: function(){
              $('#tag-change-id').replaceWith('<a href="http://localhost/tags/" class="tag-show tag-name-change"><img alt="" src="/img/icon-project.png"><span class="project-name-change-content">'+text+'</span></a>');
            }
          })
        }
      } );

    });

    // Change task name
    document.addEventListener('keydown', function (event) {
      var esc = event.which == 27,
          nl = event.which == 13,
          el = event.target,
          input = el.nodeName != 'INPUT' && el.nodeName != 'TEXTAREA',
          data = {};
          var idTask = $(el).parent().children('.ajax-change-name').attr('id');


      if (input) {
        if (esc) {
          // restore state
          document.execCommand('undo');
          el.blur();
        } else if (nl) {
          // save
          var text = data[el.getAttribute('data-name')] = el.innerHTML;
          console.log(idTask);
          $.ajax({
            type: "GET",
            url: 'tasksName/' + idTask,
            data: 'text=' + text,
            success: function(){
              $('#tasks-change-id').replaceWith('<span class="tasks-item-name">'+text+'</span>');
            }
          });

          log(JSON.stringify(data));

          el.blur();
          event.preventDefault();
        }
      }
    }, true);

    function log(s) {
      document.getElementById('title-task-name').innerHTML + s;
    }

  });
})(jQuery);
