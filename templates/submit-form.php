<!-- Submit Modal -->
<?php $id = um_profile_id(); ?>
<div class="modal-dialog submit-dialog" role="document">
    <div class="modal-content submit-modal-content">
        <div class="mobile-menu-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        <div class="mobile-menu-body">
            <div class="submit-info">
                <form class="submit-form" method="post">
                    <h2>Make a reservation</h2>
                    <div class="field">
                        <input type="text" name="name" placeholder="Name" value="<?php echo um_get_display_name( $id ) ?>" required />
                    </div>
                    <div class="field">
                        <input type="datetime-local" name="date" placeholder="Date" required/>
                    </div>
                    <div class="field">
                        <input type="text" name="email" placeholder="E-Mail" />
                    </div>
                    <div class="field">
                        <input type="tel" name="phone" placeholder="Phone Number" required />
                    </div>
                    <div class="field">
                        <textarea name="message" placeholder="Message" required></textarea>
                    </div>
                    <input type="hidden" name="user-id" value="<?php echo $id ?>" />
                    <input type="submit" name="submit-reservation" class="submit-button button" value="Send" />
                    <input type="hidden" name="hidden" value="1" />
                </form>
            </div>
        </div>
    </div>
</div>
