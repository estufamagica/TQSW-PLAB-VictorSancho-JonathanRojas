<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Create post</h1>

        <form action="?action=createPost" method="POST">

            <div class="form-group">
                <label for="title">Subject <span class="require">*</span></label>
                <input type="text" class="form-control" name="subject" />
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea rows="5" class="form-control" name="message" ></textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">
                    Create
                </button>
            </div>
        </form>
    </div>

</div>
