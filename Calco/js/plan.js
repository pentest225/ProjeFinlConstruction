$(function(){

    $('#typePlan').on('change',function(){
        var type =$('#typePlan').val();
        $.ajax({
            type: "post",
            url: "php/traitementAjax.php",
            data: {'type':type},
            dataType: "json",
            success: function (response) {
                if(response)
                {
                    var plandispo=response.length;
                    $('.nombrePlan').text(plandispo);
                    var sectionImages=document.getElementsByClassName('imagesPlan');
                    sectionImages.innerHTML=('<div class="col-md-6">');
                    response.forEach(elt => {
                                console.log(elt.description);
                                console.log(elt.images);
                                    sectionImages.innerHTML+=('<h2> TITRE DU PLAN ...</h2>')
                                        sectionImages.innerHTML+=('<img src="imagesToUpload/'+elt.images+'" alt="plan">');
                                        sectionImages.innerHTML+=('<div class="row ligne">');
                                            sectionImages.innerHTML+=('<div class="col-sm voir">');
                                                sectionImages.innerHTML+=('<a href="viewMaison.php?id='+elt.id+'"><i class="far fa-home-lg-alt"></i> voir les model</a>');
                                            sectionImages.innerHTML+=('</div>');
                                            sectionImages.innerHTML+=('<div class="col-sm agrandir">');
                                                sectionImages.innerHTML+=('<a href="#" class="">agrandir </a>');
                                            sectionImages.innerHTML+=('</div>');
                                        sectionImages.innerHTML+=('</div>');
                            });
                    sectionImages.innerHTML+=('</div>');

                }
                else
                {
                    console.log('aucune reponses');
                }
            }
        });
    })
})