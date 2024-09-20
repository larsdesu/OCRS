<div class="wrapper-report" id="rprt">
    <div class="container-report">
        <div class="report-section">
            <form id="report-form" enctype="multipart/form-data">
                <div class="close">
                    <img src="OCRS Imgs/close.png" onclick="closeReport()">
                </div>
                <div class="ttl">
                <h1>Report Crime</h1>
                </div>
                <div class="inputs">
                        <div class="email">
                            <label>E-mail Address</label>
                            <input type="email" placeholder="E-mail" id="email" name="email" required>
                        </div>
                        <div class="phonenumber">
                            <label>Phone Number</label>
                            <input type="number" placeholder="Phone Number" id="phoneNum" name="phoneNum" oninput="limitDigits(this, 11)" required>
                        </div>
                        <div class="crime">
                            <label>Type of Crime</label>
                            <input placeholder="Crime" id="crimeType" name="crimeType" type="text" list="crimeSuggestions" required>                        
                        </div>
                        <div class="crimeimg">
                            <label>Photo of Crime</label>
                            <input type="file" id="crimeImg" name="crimeImg" accept='image/jpg, image/jpeg, image/png' required>
                        </div>
                        <div class="crimeDescrip">
                            <label>Crime Description</label>
                            <textarea type="text" placeholder="Describe the Crime" id="crimeDescrip" name="crimeDescrip" required cols="30" rows="10"></textarea>
                        </div>
                        <div class="loc">
                            <label>Crime Location or URL (Online Instances)</label>
                            <input type="text" placeholder="Location or URL" id="crimeLoc" name="crimeLoc" required>
                        </div>
                        <div class="date">
                            <label>Date of Crime</label >
                            <input type="date" id="crimeDate" name="crimeDate" required>
                        </div>
                        <div class="time">
                            <label>Time of Crime (Optional)</label>
                            <input type="time" id="crimeTime" name="crimeTime">
                        </div>
                </div>
                        <div class="ch-box">
                            <input type="checkbox" id="agreeCheckbox">
                            <a href="#" id="showTerms">I Agree to the Terms and Conditions</a>
                        </div>
                        <div class="sbmt">
                            <button id="report-btn" type="submit" class="bn37">Report</button>
                        </div>
                </form>
        </div>
    </div>
</div>

<div class="overlay" id="overlay">
    <div class="tnc-modal">
        <span class="close-btn" onclick="closeModal()">X</span>
        <h2>Terms and Conditions</h2>
        <p class="tnc-ttl">User Agreement: Reporting Accuracy and Integrity</p>
        <p class="tnc-desc">By using this crime reporting system, you agree to provide accurate and truthful information to the best of your knowledge. Knowingly submitting false or misleading information is strictly prohibited and may result in penalties, legal action, and/or imprisonment.</p>
        <p class="term-ttl">1. Accuracy of Information:</p>
        <p class="tnc-txt">Users must ensure that all information submitted to the crime reporting system is accurate, complete, and truthful. Knowingly providing false information, including but not limited to false reports, witness statements, or evidence, is a violation of this agreement.</p>
        <p class="term-ttl">2. Penalties for Dishonest Reporting:</p>
        <p class="tnc-txt">In cases where dishonest reporting is identified, the user may be subject to penalties, including fines and/or imprisonment, as determined by applicable laws and regulations.</p>
        <p class="term-ttl">3. Legal Consequences:</p>
        <p class="tnc-txt">Users acknowledge that submitting false information to a crime reporting system may be considered a criminal offense under local, state, or federal laws. Law enforcement authorities may be involved in investigating and prosecuting individuals who engage in dishonest reporting.</p>
        <p class="term-ttl">4. Reporting Requirements:</p>
        <p class="tnc-txt">Users are encouraged to report any inaccuracies or errors they discover in their submissions promptly to the relevant authorities.</p>
        <p class="term-ttl">5. Compliance with Applicable Laws:</p>
        <p class="tnc-txt">Users must comply with all applicable local, state, and federal laws related to the submission of information to crime reporting systems.</p>
        <p class="term-ttl">6. System Monitoring:</p>
        <p class="tnc-txt">The crime reporting system may employ measures to monitor the accuracy of submissions, and users consent to such monitoring for the purpose of maintaining the integrity of the system.</p>
        <p class="term-ttl">7. Reservation of Rights:</p>
        <p class="tnc-txt">The administrators of the crime reporting system reserve the right to take appropriate legal action against individuals found in violation of this agreement.</p>
        <p class="term-ttl">8. Modification of Terms:</p>
        <p class="tnc-txt">These terms and conditions may be updated or modified periodically. Users are responsible for reviewing the terms regularly to stay informed about any changes.</p>
        <p class="tnc-desc">By using this crime reporting system, you acknowledge that you have read, understood, and agree to abide by these terms and conditions.</p>
        <a onclick="agreeAndClose()" class="agreed">I AGREE</a>
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