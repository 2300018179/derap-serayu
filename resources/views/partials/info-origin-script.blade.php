<script>
    (function () {
        var infoPaths = ['/kebijakan-privasi', '/syarat-ketentuan', '/pedoman-media-siber'];
        var storageKey = 'dsInfoOrigin';

        function samePath(a, b) {
            return a.replace(/\/+$/, '') === b.replace(/\/+$/, '');
        }

        try {
            if (document.referrer) {
                var ref = new URL(document.referrer);
                var isInfo = infoPaths.some(function (p) { return samePath(ref.pathname, p); });

                if (ref.origin === location.origin && !isInfo) {
                    sessionStorage.setItem(storageKey, ref.pathname + ref.search);
                }
            }

            var origin = sessionStorage.getItem(storageKey);

            if (!origin) {
                return;
            }

            var originPath = origin.split('?')[0];
            var navLinks = document.querySelectorAll('#mainNavigation > a');
            var matched = null;

            navLinks.forEach(function (link) {
                link.classList.remove('active');

                if (samePath(new URL(link.href).pathname, originPath)) {
                    matched = link;
                }
            });

            if (matched) {
                matched.classList.add('active');
            }

            var crumb = document.querySelector('.breadcrumb a');

            if (crumb) {
                crumb.href = origin;
                crumb.textContent = matched ? matched.textContent.trim() : 'Kembali';
            }
        } catch (e) {}
    })();
</script>
