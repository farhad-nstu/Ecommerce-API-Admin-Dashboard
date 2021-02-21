<!-- footer @s -->
<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
            </div>
            <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- footer @e -->
</div>
<!-- wrap @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->

<script src="{{ asset('assets/js/bundle.js?ver=1.9.2') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=1.9.2') }}"></script>
<script src="{{ asset('assets/js/libs/editors/summernote.js?ver=1.9.2') }}"></script>

<script type="text/javascript">

    var url = "{{ route('changeLang') }}"; 
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>
@yield('scripts')
</body>

</html>