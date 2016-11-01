 $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });
   
   $('a[href="#topo"]').click(function(){
       $('html, body').animate({scrollTop: 0}, 'slow');
       return false;
   });
 
 $('button#delete').on('click', function () {
	 swal({
			 title: "Deseja realmente remover?",
			 text: "Não poderá recuperar os dados!", type: "warning",
			 showCancelButton: true,
			 confirmButtonColor: "#DD6B55",
			 confirmButtonText: "Sim",
			 closeOnConfirm: false
		 },
		 function () {
			 $("#myform").submit();
		 });
 });