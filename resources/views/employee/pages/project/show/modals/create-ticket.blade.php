<div class="modal fade" id="CreateTicketModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <form action="{{ route('employee-panel.project.ticket.create') }}" method="post" class="modal-dialog" style="max-width:900px;">
        @csrf
        <input type="hidden" name="status_id" value="1">
        <input type="hidden" name="relation_id" value="{{ $project->id }}">
        <input type="hidden" name="relation_type" value="App\Models\Project">
        <input type="hidden" name="creator_id" value="{{ auth()->user()->getId() }}">
        <input type="hidden" name="creator_type" value="App\Models\Employee">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Destek Talebi Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="form-group">
                            <label for="ticket_title">Talep Başlığı</label>
                            <input type="text" name="title" id="ticket_title" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="ticket_priority">Öncelik Durumu</label>
                            <select name="priority_id" id="ticket_priority" class="form-control selectpicker" required>
                                @foreach($priorities as $priority)
                                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="ticket_description">Mesajınız</label>
                            <textarea class="form-control" name="description" id="ticket_description" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="create_ticket">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelCreateTicket">Vazgeç</button>
            </div>
        </div>
    </form>
</div>
