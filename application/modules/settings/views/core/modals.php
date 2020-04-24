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
                     <div class="form-group">
                         <label for="link">Link</label>
                         <input type="text" name="link" id="link" class="form-control form-control-sm" placeholder="masukkan Link" required>
                     </div>
                     <div class="form-group">
                         <label for="icon">Icon</label>
                         <select name="icon" id="icon" class="form-control" required>
                             <option value="">Pilih Icon</option>
                             <option value="fa fa-fw fa-facebook">Facebook</option>
                             <option value="fa fa-fw fa-instagram">Instagram</option>
                             <option value="fa fa-fw fa-twitter">Twitter</option>
                             <option value="fa fa-fw fa-youtube-play">Youtube</option>
                             <option value="fa fa-fw fa-whatsapp">Whatsapp</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="warna">Warna</label>
                         <select name="warna" id="warna" class="form-control" required>
                             <option value="">Pilih Warna</option>
                             <option value="btn-success">Hijau</option>
                             <option value="btn-primary">Biru</option>
                             <option value="btn-info">Biru Langit</option>
                             <option value="btn-danger">Merah</option>
                             <option value="btn-warning">Orange</option>
                         </select>
                     </div>
                     <div id="add">
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