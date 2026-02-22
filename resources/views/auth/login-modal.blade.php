<div class="modal fade" id="loginModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
        </div>
        <div class="modal-body">
          <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
          <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
          <a href="{{ route('requests.create') }}">Request Account</a>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
