<div class="modal fade" id="new-folder-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="new-folder-form" name="new-folder-form">
                    <input type="hidden" name="folder[space_id]" value="{{ $space->getKey() }}">
                    <div class="form-group">
                        <label for="folder-name">Name:</label>
                        <input class="form-control" id="folder-name" name="folder[name]" autocomplete="off">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                <button form="new-folder-form" id="new-folder-form-btn" formaction="{{ route('api.folder.create') }}" formmethod="POST" class="btn btn-outline-primary">Create</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function($) {
            let newFolderModal = null;

            $('#new-folder-trigger').on('click', (event) => {
                event.preventDefault();
                newFolderModal = $('#new-folder-modal').modal('show');
            });

            $('#new-folder-form-btn').on('click', function(event) {
                event.preventDefault();

                let action = $(this).attr('formaction');
                let data = $('#new-folder-form').serialize();

                axios.post(action, data).then((response) => {
                    let id = response.data.data.id;
                    let name = response.data.data.name;

                    let html = '<li class="nav-item">\n' +
                        '        <a class="nav-link  collapsed " href="#" data-toggle="collapse" data-target="#item-' + id + '" aria-expanded="false" aria-controls="collapsePages">\n' +
                        '            <i class="fas fa-fw fa-folder"></i>\n' +
                        '            <span>' + name + '</span>\n' +
                        '        </a>\n' +
                        '        <div id="item-' + id + '" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">\n' +
                        '            <div class="bg-white py-2 collapse-inner rounded">\n' +
                        '                                    <a class="collapse-item">Empty</a>\n' +
                        '                            </div>\n' +
                        '        </div>\n' +
                        '    </li>';

                    $(html).insertBefore('#afterSpaceItems');
                    newFolderModal.modal('hide');
                    $('#folder-name').val('');
                });
            });
        });
    </script>
@endpush
