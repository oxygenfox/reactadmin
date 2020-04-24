<!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form">
                <div class="modal-body">
                    <div id="alert"></div>
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="user" id="user" class="form-control form-control-sm" placeholder="Username" required>
                    </div>
                    <div id="tes"></div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control form-control-sm" required>
                            <option value="">Pilih Role</option>
                            <?php foreach ($role as $r) {
                                if ($this->session->userdata('role') != 1) {
                                    if ($r->id_role != 1) { ?>
                                        <option value="<?= $r->id_role ?>"><?= $r->role ?></option>
                                    <?php }
                                } else { ?>
                                    <option value="<?= $r->id_role ?>"><?= $r->role ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btn">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>