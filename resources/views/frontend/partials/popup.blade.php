@if($popup  == 1)

    <div class="modal fade" id="frontPopupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! $popupContent !!}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(window).on('load', function () {
                $('#frontPopupModal').modal('show');
            });
        </script>
    @endpush

@endif
