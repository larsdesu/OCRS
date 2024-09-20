<div id="insertModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
                <div id="insertModalData">

    <form id='createForm' action='AD_BACKEND/createReport.php' method="post" enctype="multipart/form-data">
            <h1>Insert Report</h1>
        <div class='inputs'>
                <input type='hidden' name='id'>
            <div class='groups'>

                <div class='g1'>
                    <div class='edit-data'>
                        <label>E-mail:</label>
                        <input type='text' name='email' required>
                    </div>
                    <div class='edit-data'>
                        <label>Phone Number:</label>
                        <input type='text' name='phoneNum' required>
                    </div>
                </div>

                <div class='g2'>
                    <div class='edit-data'>
                        <label>Type of Crime:</label>
                        <input placeholder="Crime" id="crimeType" name="crimeType" type="text" list="crimeSuggestions" required>                        
                    </div>
                    <div class='edit-data crimg'>
                        <label>Crime Image:</label>
                        <input type='file' name='crimeImg' accept='image/jpg, image/jpeg, image/png' required>
                    </div>
                    <div class='edit-data'>
                        <label>Crime Location:</label>
                        <input type='text' name='crimeLoc' required>
                    </div>
                </div>

                <div class='g3'>
                    <div class='edit-data'>
                        <label>Date of Crime:</label>
                        <input type='date' name='crimeDate' class='date-time-status' required>
                    </div>
                    <div class='edit-data'>
                        <label>Time of Crime:</label>
                        <input type='time' name='crimeTime' class='date-time-status'>
                    </div>
                    <div class='edit-data'>
                        <label>Status:</label>
                        <select name='reportProgress' class='date-time-status'>
                            <option value='SUBMITTED'>SUBMITTED</option>
                            <option value='REVIEWING'>REVIEWING</option>
                            <option value='PROCESSING'>PROCESSING</option>
                            <option value='RESOLVED'>RESOLVED</option>
                            <option value='DISPOSED'>DISPOSED</option>
                        </select>
                    </div>
                </div>

                <div class='buttons'>
                    <button type='button' id='cancel-btn'>Cancel</button>
                    <button id='save-btn' type="submit" name="submit">Insert</button>
                </div>
            </div>

        </div>
    </form>


        </div>
    </div>
</div>

<datalist id="crimeSuggestions">
    <option value="Animal Cruelty">Animal Cruelty</option>
    <option value="Arson">Arson</option>
    <option value="Burglary">Burglary</option>
    <option value="Child Abuse">Child Abuse</option>
    <option value="Child Endangerment">Child Endangerment</option>
    <option value="Child Pornography">Child Pornography</option>
    <option value="Computer-based fraud">Computer-based fraud</option>
    <option value="Cyberbullying">Cyberbullying</option>
    <option value="Disorderly conduct">Disorderly conduct</option>
    <option value="Driving Under the Influence of Alcohol (DUI)">Driving Under the Influence of Alcohol (DUI)</option>
    <option value="Driving without a license">Driving without a license</option>
    <option value="Drug Manufacturing">Drug Manufacturing</option>
    <option value="Drug Trafficking">Drug Trafficking</option>
    <option value="Embezzlement">Embezzlement</option>
    <option value="Espionage">Espionage</option>
    <option value="Forgery and Counterfeiting">Forgery and Counterfeiting</option>
    <option value="Fraud">Fraud</option>
    <option value="Gang-related Crimes">Gang-related Crimes</option>
    <option value="Hacking">Hacking</option>
    <option value="Homicide">Homicide</option>
    <option value="Human trafficking">Human trafficking</option>
    <option value="Human Rights Violations">Human Rights Violations</option>
    <option value="Identity Theft">Identity Theft</option>
    <option value="Illegal dumping">Illegal dumping</option>
    <option value="Insider Trading">Insider Trading</option>
    <option value="Kidnapping">Kidnapping</option>
    <option value="Money laundering">Money laundering</option>
    <option value="Murder">Murder</option>
    <option value="Phishing">Phishing</option>
    <option value="Pollution offenses">Pollution offenses</option>
    <option value="Possession of Controlled Substances">Possession of Controlled Substances</option>
    <option value="Prostitution and Solicitation">Prostitution and Solicitation</option>
    <option value="Public Intoxication">Public Intoxication</option>
    <option value="Racketeering">Racketeering</option>
    <option value="Rape">Rape</option>
    <option value="Reckless driving">Reckless driving</option>
    <option value="Rioting">Rioting</option>
    <option value="Robbery">Robbery</option>
    <option value="Sexual Assault">Sexual Assault</option>
    <option value="Speeding">Speeding</option>
    <option value="Stalking">Stalking</option>
    <option value="Tax evasion">Tax evasion</option>
    <option value="Terrorism">Terrorism</option>
    <option value="Theft">Theft</option>
    <option value="Treason">Treason</option>
    <option value="Vandalism">Vandalism</option>
    <option value="Wildlife trafficking">Wildlife trafficking</option>
    <option value="War Crimes">War Crimes</option>
</datalist>