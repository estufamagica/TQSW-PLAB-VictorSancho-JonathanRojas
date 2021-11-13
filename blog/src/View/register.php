<form method="post" action="?action=register">
    <div class="form-outline mb-4">
        <input type="email" id="email" name="email" class="form-control" />
        <label class="form-label" for="email">Email</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="user" name="username" class="form-control" />
        <label class="form-label" for="user">Username</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" id="passoword1"  name="password" class="form-control" />
        <label class="form-label"  for="passoword1">Password</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" id="passoword2" name="passwordVerify" class="form-control" />
        <label class="form-label" for="passoword2">Repeat Password</label>
    </div>
    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
</form>