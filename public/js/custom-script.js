var site_url = 'http://localhost/trb/';

$(function (){
    var option_id = parseInt($('#correct_answer').val());
    $('#option_'+option_id).prop('checked', true);
});

// $('#question_number').change(function(){
//     var question = $(this).val();
//     $.ajax({
//         type: 'post',
//         url: site_url+"objection/question_detail",
//         data: { question : question},
//         dataType: "json",
//         success: function (response) {
//             var choice1 = response.option_1
//             var choice2 = response.option_2
//             var choice3 = response.option_3
//             var choice4 = response.option_4
//             $('#question_text').val(response.question_text);
//             $('#1_choice_text').html(choice1);
//             $('#2_choice_text').html(choice2);
//             $('#3_choice_text').html(choice3);
//             $('#4_choice_text').html(choice4);
//             var option_id = parseInt(response.correct_answer);
//             $('#'+option_id+'_choice').prop('checked', true);
//             if(option_id == 1){
//                 $('#authorized_answer').val(choice1);
//             }
//             else if(option_id == 2){
//                 $('#authorized_answer').val(choice2);
//             }
//             else if(option_id == 3){
//                 $('#authorized_answer').val(choice3);
//             }
//             else{
//                 $('#authorized_answer').val(choice1);
//             }
//         }
//     });
// });

$('#objection_type').change(function(){
    var question = $('#question_number').val();
    var category = $(this).val();

    $.ajax({
        type: 'post',
        url: site_url+"objection/detail",
        data: { category : category, question:question},
        dataType: "json",
        success: function (response) {
            //$('#objection-list').remove();
            html = '';
            $.each(response, function(index, value){
                html += '<tr>\
                            <td>'+value['objection_text']+'</td>\
                            <td>'+value['book_name']+'</td>\
                            <td>'+value['author_name']+'</td>\
                            <td>'+value['page_number']+'</td>\
                            <td><a href='+site_url+'public/upload/'+value["upload_document"]+' target="_blank">'+value["upload_document"]+'</a></td>\
                        </tr>'
            });
            $('#objection-list').html(html);
        }
    });
});    