
$(function() {
    $("#image").get(0).draggable = false;
    var $container = $('#container');
    var $selection = $('<div>').addClass('drawing');
    
    $container.on('mousedown', function(e) {
        target = $(e.target);
        if(target.attr("id") != 'image') return;
        if(e.which != 1) return;
        var click_y = e.pageY,
	    click_x = e.pageX;
      
        $selection.css({
          'top':    click_y,
          'left':   click_x,
          'width':  0,
          'height': 0
        });
        $selection.appendTo($container);
        
        $container.on('mousemove', function(e) {
        if(target.attr("id") != 'image') return;
        if(e.which != 1) return;       
          var move_x = e.pageX,
              move_y = e.pageY,
              width  = Math.abs(move_x - click_x),
              height = Math.abs(move_y - click_y),
              new_x, new_y;
          
          new_x = (move_x < click_x) ? (click_x - width) : click_x;
          new_y = (move_y < click_y) ? (click_y - height) : click_y;
          if(width != 0 && height != 0)
          $selection.css({
            'width': width,
            'height': height,
            'top': new_y,
            'left': new_x
          });
          
        }).on('mouseup', function(e) {
            if(target.attr("id") != 'image') return;
            if(e.which != 1) return;
            $container.off('mousemove');
            $(".note").remove();
           if($selection.width() > 15) 
           {
               var note = $selection.clone();
               note.prop("class","note");
               note.append("<span class='tip-num'>1</span>");
               note.appendTo($container);
               note.draggable(
                {
                    containment: "#container",
                    drag: function(){
                        var offset = $(this).offset();              
                        $("#top").val(offset.top)
                        $("#left").val(offset.left)
                    }
                });
              note.attr('title',"Hello comment");
               note.tooltip({
                    alsoResize: $("#container"),
                    position: {
                        my: 'left center', at: 'right+10 center'
                    }
                  });
               note.resizable({                
                stop : function(event,ui) {                    
                    $("#width").val(ui.size.width);
                    $("#height").val(ui.size.height);
                },
               });
               note.show();
               $(".form").show();
               saveCSS(note);
           }
            
            $selection.remove();
        });
    });
});
function saveCSS(e)
{
    var pos = e.position();
    $("#form").show();
    $("#top").val(pos.top)
    $("#left").val(pos.left)
    $("#width").val(e.width())
    $("#height").val(e.height())
}