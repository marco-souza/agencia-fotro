$(document).ready(function(){

    $("#nav").hover(
        function(){

            $("#content").animate({'margin-left': "200px"}, 200);

            $("#nav").animate({'width': "200px"}, 200);
            $("#menu > div spam").show()

            $("#social").animate({'width': "200px"}, 200);
            // $("#social h5").show()

            $("#btn").animate({'width': "200px"}, 200);

        },function () {

            $("#content").animate({'margin-left': "60px"}, 200);

            $("#menu > div spam").hide()
            $("#nav").animate({'width': "60px"}, 200);

            $("#social").animate({'width': "60px"}, 200);
            // $("#social h5").hide()

            $("#btn").animate({'width': "60px"}, 200);

        }
    );
});
