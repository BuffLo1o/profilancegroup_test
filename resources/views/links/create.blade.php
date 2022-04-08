<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

<div class="main">
    <div class="form">
        <div class="error"></div>
        <div class="form-group">
            <input type="text" name="link" id="link" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Сократить">
        </div>

        <div class="short_link">
        </div>
    </div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let link = $('input[id="link"]')
    let submit = $('input[type="submit"]')
    let errors = $('div[class="error"]')
    let short_link = $('div[class="short_link"]')

    submit.click(function () {
        $.ajax({
            url: "{{ route('generate.link') }}",
            type: 'post',
            data: {'link': link.val()},
            success: function (data) {
                short_link.html('<label>Ваша ссылка:</label><a href="' + data['short_link'] + '">' + data['short_link'] + '</a>')
                // short_link.href = data['short_link']
                // short_link.val = data['short_link']
            },
            error: function (data) {
                console.log(data)
            }
        })
    })

</script>
</html>
