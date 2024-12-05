
<div class="form-group mb-3">
    <label for="user_id" class="form-label">Seleccionar un user</label>
    <select name="user_id" id="user_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una user --</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name}} {{ $user->ap}} {{ $user->am}}</option>
        @endforeach
    </select>    
</div> 

<div class="form-group mb-3">
    <label for="role_id" class="form-label">Seleccionar un role</label>
    <select name="role_id" id="role_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una role --</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name}}</option>
        @endforeach
    </select>    
</div> 



    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
