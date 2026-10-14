<section class="form-section checkout">
    <form action="" class="checkout-form">
        <div class="checkout-main">
            <fieldset class="checkout-step">
                <legend><span>1</span> Choose an amount</legend>
                <div class="amount-options">
                    <label><input type="radio" name="amount" value="10"><span>$10</span></label>
                    <label><input type="radio" name="amount" value="25" checked><span>$25</span></label>
                    <label><input type="radio" name="amount" value="50"><span>$50</span></label>
                    <label><input type="radio" name="amount" value="100"><span>$100</span></label>
                </div>
            </fieldset>

            <fieldset class="checkout-step">
                <legend><span>2</span> Your details</legend>
                <div class="field">
                    <label for="name">Full name</label>
                    <input type="text" id="name" name="name" autocomplete="name" required>
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" autocomplete="email" required>
                </div>
            </fieldset>

            <fieldset class="checkout-step">
                <legend><span>3</span> Payment</legend>
                <div class="field">
                    <label for="card">Card number</label>
                    <input type="text" id="card" name="card" inputmode="numeric" placeholder="1234 1234 1234 1234" autocomplete="cc-number">
                </div>
                <div class="field-row">
                    <div class="field">
                        <label for="expiry">Expiry</label>
                        <input type="text" id="expiry" name="expiry" placeholder="MM / YY" autocomplete="cc-exp">
                    </div>
                    <div class="field">
                        <label for="cvc">CVC</label>
                        <input type="text" id="cvc" name="cvc" inputmode="numeric" placeholder="123" autocomplete="cc-csc">
                    </div>
                </div>
            </fieldset>

            <div class="field">
                <label for="message">Message (optional)</label>
                <textarea id="message" name="message"></textarea>
            </div>
        </div>

        <aside class="checkout-summary">
            <h3>Order summary</h3>
            <ul>
                <li><span>Donation</span><span>Selected amount</span></li>
                <li><span>Processing fee</span><span>$0.00</span></li>
            </ul>
            <p class="summary-note">Your gift supports Houston's carbon reduction efforts.</p>
            <button type="submit">Complete donation</button>
            <p class="secure">&#128274; Secure checkout</p>
        </aside>
    </form>
</section>