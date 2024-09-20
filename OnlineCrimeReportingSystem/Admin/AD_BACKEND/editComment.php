<div class="modal-content">
    <span class="close" id="cancel-btn">&times;</span>
        <form>
            <h2>EDIT</h2>
            <div class="g1">
                <div class="edit-data">
                    <label >ID:</label>
                    <input type="text" id="id" name="id" readonly>
                </div>
                <div class="edit-data">
                    <label >E-mail:</label>
                    <input type="text" id="email" name="email" readonly>
                </div>
            </div>
            <div class="g2">
                <div class="edit-data">
                    <label >Comment:</label>
                    <textarea id="comment" name="comments" rows="4" readonly></textarea>
                </div>
            </div>
            <div class="g3">
                <div class="edit-data">
                    <label >Date Commented:</label>
                    <input type="text" id="date" name="commentDate" readonly>
                </div>
                <div class="edit-data">
                    <label >Display Comment:</label>
                    <select id='displayComment' name='displayComment'>
                        <option value='YES'>YES</option>
                        <option value='NO'>NO</option>
                    </select>
                </div>
            </div>
            <div class="buttons">
                <button type="button" id="delete-btn">Delete</button>
                <button type="button" id="save-btn">Save</button>
            </div>
        </form>
</div>