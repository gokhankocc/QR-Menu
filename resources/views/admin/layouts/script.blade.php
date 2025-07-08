<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('/panel/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('/panel/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('/panel/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/panel/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/panel/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('/panel/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('/panel/plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('/panel/assets/js/dashboard/dash_1.js')}}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<script src="{{asset('/panel/plugins/table/datatable/datatables.js')}}"></script>

<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "_PAGES_ Sayfa İçinden _PAGE_. Sayfa Gösteriliyor",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Ara...",
            "sLengthMenu": "Sayfa Başına _MENU_ Kayıt Göster",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7,
        "stateSave" : true
    });
</script>

<script src="{{asset('/panel/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('/panel/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('/panel/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{asset('/panel/plugins/notification/snackbar/snackbar.min.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="{{asset('/panel/assets/js/components/notification/custom-snackbar.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    var secondUpload = new FileUploadWithPreview('mySecondImage')

    function checkBeforeDelete(formid){
        Swal.fire({
            title: 'Silmek istediğinize emin misiniz?',
            text: "Bu İşlem Geri Alınamaz!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: 'İptal Et'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formid).submit()
            }
        })
    }
</script>


<script type="text/javascript">
    @if (session('success'))
    Snackbar.show({
        text: '{{ session('success') }}',
        actionTextColor: '#fff',
        backgroundColor: '#2196f3',
        pos: 'top-right'
    });
    @elseif(session('error'))
    Snackbar.show({
        text: '{{ session('error') }}',
        actionTextColor: '#fff',
        backgroundColor: '#e7515a',
        pos: 'top-right'
    });
    @endif

    /// TODO : deleted - check

    $(document).ready(function() {
        $('.summernote').summernote();
    });

</script>
<script src="{{ asset('/panel/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('/panel/plugins/select2/custom-select2.js') }}"></script>
@yield('js')
