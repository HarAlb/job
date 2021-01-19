<div id="imageUploadModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image upload</h5>
                <button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="image-upload">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Input Image</label>
                        <input type="file" class="form-control-file" id="imageFileInput" accept=".jpg,.jpeg,.png">
                    </div>
                </form>
                <div class="d-none">
                    <div class="col-md-12">
                        <div class="w-100">
                            <img src="" alt="Uploade" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn rotate rotate-left-90"><i class="bi bi-arrow-90deg-left"></i></button>
                        <button class="btn rotate rotate-rigth-90"><i class="bi bi-arrow-90deg-right"></i></button>
                        <button class="btn rotate rotate-left-180"><i class="bi bi-arrow-clockwise"></i></button>
                        <button class="btn move move-up"><i class="bi bi-arrow-bar-up"></i></button>
                        <button class="btn move move-down"><i class="bi bi-arrow-bar-down"></i></button>
                        <button class="btn move move-left"><i class="bi bi-arrow-bar-left"></i></button>
                        <button class="btn move move-right"><i class="bi bi-arrow-bar-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-none justify-content-between">
                <div class="form-group flex-fill">
                    <input type="email" name="email" placeholder="Email Please" class="form-control"/>
                </div>
                <div class="buttons">
                    <button class="btn btn-primary save">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>