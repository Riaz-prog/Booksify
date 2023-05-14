  $(document).on('click', '#pagi2 a', function(e) {
    e.preventDefault();
    var id = $(this).attr('id');
    var value = $(this).data('val');
    loadable(id,value);
  });

  function loadable(page,value){
    $.ajax({
      url:"../book/bookfetch2.php",
      type:"post",
      data:{page:page,val:value},
      success:function(data){
        $('#main').html(data);
      }
    });
  }

  $(document).on('click', '.prev-btn2', function(e) {
    e.preventDefault();
    var value = $(this).data('val');
    var page=$(this).data('id');
    if (page > 5) {
      page-=5;
      loadable(page,value);
    }else if(page>1){
      page-=1;
      loadable(page,value);
    }
  });

  $(document).on('click', '.next-btn2', function(e) {
    e.preventDefault();
    var page=$(this).data('id');
    var value = $(this).data('val');
    var totalpage=$(this).data('eid');
    if (page < totalpage) {
      loadable(page,value);
    }
  });