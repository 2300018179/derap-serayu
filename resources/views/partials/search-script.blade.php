@once
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var forms = document.querySelectorAll('form[role="search"]');
            var url = new URL(window.location.href);
            var currentQuery = (url.searchParams.get('q') || '').trim();

            if (currentQuery === '') {
                sessionStorage.setItem('dsSearchOrigin', window.location.href);
            }

            forms.forEach(function (form) {
                var input = form.querySelector('input[name="q"]');

                if (!input) {
                    return;
                }

                if (sessionStorage.getItem('dsSearchTyping') === '1' && currentQuery !== '') {
                    input.focus();
                    input.setSelectionRange(input.value.length, input.value.length);
                }

                var timer = null;

                input.addEventListener('input', function () {
                    clearTimeout(timer);
                    sessionStorage.setItem('dsSearchTyping', '1');

                    timer = setTimeout(function () {
                        var value = input.value.trim();

                        if (value === currentQuery) {
                            return;
                        }

                        if (value !== '') {
                            form.requestSubmit();
                            return;
                        }

                        if (currentQuery !== '') {
                            sessionStorage.removeItem('dsSearchTyping');
                            window.location.href = sessionStorage.getItem('dsSearchOrigin') || form.action;
                        }
                    }, 500);
                });

                form.addEventListener('submit', function () {
                    if (input.value.trim() === '') {
                        sessionStorage.removeItem('dsSearchTyping');
                    }
                });
            });
        });
    </script>
@endonce
