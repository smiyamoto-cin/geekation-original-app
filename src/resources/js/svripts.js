/*!
* Start Bootstrap - Landing Page v6.0.6 (https://startbootstrap.com/theme/landing-page)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-landing-page/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
$(document).ready(function() {
    // 回答結果を表示する関数
    function showResult(isCorrect) {
        if (isCorrect) {
            $('.result-message').html('<p style="font-size: 15px; color: green;"><i class="fa-regular fa-circle-check"></i> 正解です！</p>');
        } else {
            $('.result-message').html('<p style="font-size: 15px; color: red;"><i class="fa-solid fa-xmark"></i> 不正解です！</p>');
        }
    }

    // フォームの送信イベントをキャプチャ
    $('form').submit(function(event) {
        event.preventDefault(); // フォームのデフォルトの送信動作をキャンセル

        // 選択された選択肢のIDを取得
        var selectedChoiceId = $('input[name="user_answer"]:checked').val();

        // Ajaxを使用して回答を送信
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: {
                '_token': $('input[name="_token"]').val(),
                'user_answer': selectedChoiceId,
                'next_quiz_id': $('input[name="next_quiz_id"]').val()
            },
            success: function(response) {
                // 正解かどうかを判定して結果を表示
                showResult(response.isCorrect);

                // 次の問題へリダイレクト
                window.location.href = response.redirectUrl;
            },
            error: function(xhr) {
                // エラーメッセージを表示
                if (xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.user_answer) {
                    $('.error-message').html('<p style="font-size: 15px; color: red;">回答を選択してください</p>');
                }
            }
        });
    });
});
