<!-- resources/views/share.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Links</title>
</head>
<body>
    <div>
        <h2>Share Links</h2>

        @foreach ($shareLinks as $links)
            <div>
                <strong>WhatsApp:</strong> <span class="whatsapp-link">{{ $links['whatsapp'] }}</span>
                <button class="copy-btn" data-clipboard-target=".whatsapp-link">Copy WhatsApp Link</button>
            </div>

            <div>
                <strong>Facebook:</strong> {{ $links['facebook'] }}
            </div>

            <div>
                <strong>Twitter:</strong> {{ $links['twitter'] }}
            </div>

            <hr>
        @endforeach

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var clipboard = new ClipboardJS('.copy-btn');

            clipboard.on('success', function (e) {
                alert('Link copied to clipboard!');
            });

            clipboard.on('error', function (e) {
                alert('Failed to copy link to clipboard. You can manually copy it.');
            });
        });
    </script>
</body>
</html>
