<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
      <div class="modal-content">
        <form action="{{ route('users.store') }}" method="post">
          @csrf              
          <div class="modal-header">
            <h4 class="modal-title">Create New User</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>
            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <div class="row">
              <div class="col-6">
                  <select name="role" class="form-control mb-3" id="role_select">
                    <option value="">-- Qualification(Select Quali) --</option>
                    @foreach($quali as $i => $qualis)
                        <option value="{{ $qualis->quali_name }}">{{ ucwords($qualis->quali_name) }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-6">
                  <select name="role" class="form-control mb-3" id="role_select">
                    <option value="">-- Institutions(Select TTI) --</option>
                    @foreach($tti as $i => $ttis)
                        <option value="{{ $ttis->tti_abrv }}">{{ ucwords($ttis->tti_abrv) }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <select name="role" class="form-control mb-3" id="role_select">
                <option value="">-- Role(Skip if Role is only User) --</option>
                @foreach($roles as $i => $role)
                    <option value="{{ $role->name }}">{{ ucwords($role->name) }}</option>
                @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>