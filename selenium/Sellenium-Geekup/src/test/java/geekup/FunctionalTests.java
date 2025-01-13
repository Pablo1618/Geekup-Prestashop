package org.geekup;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.openqa.selenium.*;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import java.io.File;
import java.io.IOException;
import java.time.Duration;
import java.util.List;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.Logger;

import static org.junit.jupiter.api.Assertions.*;

public class FunctionalTests {
    private WebDriver driver;
    private WebDriverWait wait;

    // Wyłączenie logów Selenium
    static {
        Logger seleniumLogger = Logger.getLogger("org.openqa.selenium");
        seleniumLogger.setLevel(Level.SEVERE);
    }

    @BeforeEach
    public void setUp() throws IOException {

        String websiteURL = "https://localhost:8443/index.php";

        System.setProperty("webdriver.chrome.driver", new File("./src/main/resources/chromedriver.exe").getCanonicalPath());

        // Ignorujemy powiadomienie, ze strona jest niebezpieczna (certyfikat SSL)
        ChromeOptions options = new ChromeOptions();
        options.addArguments("--ignore-certificate-errors");

        driver = new ChromeDriver(options);
        wait = new WebDriverWait(driver, Duration.ofSeconds(10));
        driver.get(websiteURL); // Ładowanie strony głównej przed każdym testem
        driver.manage().window().maximize();
    }


    // 1. Dodanie do koszyka produktów (w różnych ilościach) z różnych kategorii
    // 2. Usunięcie produktów z koszyka
    @Test
    public void addAndRemoveToCartProductsFromCategories() throws InterruptedException {

        String[] categories = {"Do Domu, Biura i Kuchni", "Repliki"};
        int productsAmountFromEachCategory = 5;
        int productMaxQuantity = 3;
        int amountOfProductsToRemove = 3;

        int quantityInBasket = 0;

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[class='row'] div[id='_desktop_top_menu'] ul[id='top-menu'] li[id='category-358'] a"))).click();
        for (String categoryTitle : categories) {

            String categorySelector = String.format("ul[class='subcategories-list'] a[title='%s']", categoryTitle);
            wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector(categorySelector))).click();

            // Dodanie produktów do koszyka z danej kategorii
            for (int i = 0; i < productsAmountFromEachCategory; i++) {

                List<WebElement> products = wait.until(ExpectedConditions.visibilityOfAllElementsLocatedBy(By.cssSelector("div[class='product-description'] span[class='product-title'] a")));
                assertFalse(products.isEmpty(), "Kategoria nie posiada produktów");

                // Wybór produktu losowo
                Random random = new Random();
                int randomIndex = random.nextInt(products.size());
                WebElement randomProduct = products.get(randomIndex);
                wait.until(ExpectedConditions.elementToBeClickable(randomProduct)).click();

                // Losowa ilość produktu
                int quantity = random.nextInt(productMaxQuantity) + 1;
                wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("input[id='quantity_wanted']"))).click();
                WebElement searchBox = wait.until(ExpectedConditions.visibilityOfElementLocated(By.cssSelector("input[id='quantity_wanted']")));
                searchBox.sendKeys(Keys.BACK_SPACE); // Usuniecie "1"
                searchBox.sendKeys(Integer.toString(quantity));

                wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[class='add'] button[class='btn btn-primary add-to-cart']"))).click();
                quantityInBasket += quantity;

                driver.navigate().back(); // Po dodaniu produktu do koszyka powrót do listy produktów z danej kategorii
            }

            driver.navigate().back(); // Z powrotem do wyboru kategorii
        }

        String cartCount = wait.until(ExpectedConditions.visibilityOfElementLocated(By.cssSelector("div[class='header'] span[class='cart-products-count bold']"))).getText();
        assertEquals("(" + quantityInBasket + ")", cartCount, "Nie udalo sie dodac produktów do koszyka");

        // Usuniecie produktów z koszyka
        wait.until(ExpectedConditions.elementToBeClickable((By.cssSelector("div[id='_desktop_cart'] a")))).click();

        for(int i = 0; i < amountOfProductsToRemove; i++) {

            int previousAmount = driver.findElements(By.cssSelector("input[class='js-cart-line-product-quantity form-control']")).size();
            wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[class='cart-line-product-actions'] a[class='remove-from-cart']"))).click();
            // Czekanie az obiekt DOM faktycznie zostanie usuniety
            wait.until(driver -> driver.findElements(By.cssSelector("input[class='js-cart-line-product-quantity form-control']")).size() < previousAmount);
        }

        int cartCountAfterRemove = Integer.parseInt(
                wait.until(ExpectedConditions.visibilityOfElementLocated(By.cssSelector("div[class='header'] span[class='cart-products-count bold']")))
                        .getText()
                        .replaceAll("[()]", "") // Kasujemy nawiasy
        );

        System.out.println("Liczba produktow w koszyku: " + quantityInBasket);
        System.out.println("Liczba produktow w koszyku po usunieciu " + amountOfProductsToRemove + " produktow: " + cartCountAfterRemove);

        assertTrue(cartCountAfterRemove < quantityInBasket, "Nie udalo sie usunac produktow z koszyka");


    }

    // 1. Wyszukanie produktu po nazwie
    // 2. Dodanie do koszyka losowego produktu spośród znalezionych
    @Test
    public void searchAndAddProductToCart() throws InterruptedException {

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[id='search_widget'] form"))).click();
        WebElement searchBox = wait.until(ExpectedConditions.visibilityOfElementLocated(By.cssSelector("div[id='search_widget'] input[name='s']")));
        searchBox.sendKeys("mystery box");
        searchBox.submit();
        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[class='thumbnail-top'] img"))).click();
        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[class='add'] button[class='btn btn-primary add-to-cart']"))).click();
        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[class='modal-header'] button[class='close'] i[class='material-icons']"))).click();

        String cartCount = wait.until(ExpectedConditions.visibilityOfElementLocated(By.cssSelector("div[class='header'] span[class='cart-products-count bold']"))).getText();
        assertEquals("(1)", cartCount, "Nie udalo sie dodac produktu do koszyka");
    }

    // 1. Wykonanie zamówienia zawartości koszyka
    // 2. Wybór jednego z dwóch przewoźników
    // 3. Wybór metody płatności: przy odbiorze
    // 4. Zatwierdzenie zamówienia
    @Test
    public void RegisterAccountAndOrderProduct() throws InterruptedException {

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("a[title='Register to your customer account']"))).click();

        Random random = new Random();

        // Formularz rejestracji konta

        WebElement firstName = wait.until(ExpectedConditions.visibilityOfElementLocated(By.id("field-firstname")));
        firstName.sendKeys("Jan");
        WebElement lastName = driver.findElement(By.id("field-lastname"));
        lastName.sendKeys("Kowalski");
        WebElement email = driver.findElement(By.id("field-email"));
        email.sendKeys("test" + random.nextInt(10000) + "@example.com");
        WebElement password = driver.findElement(By.id("field-password"));
        password.sendKeys("123456789");
        WebElement birthday = driver.findElement(By.id("field-birthday"));
        birthday.sendKeys("1990-01-01");
        WebElement privacyCheckbox = driver.findElement(By.name("customer_privacy"));
        privacyCheckbox.click();
        WebElement termsCheckbox = driver.findElement(By.name("psgdpr"));
        termsCheckbox.click();

        WebElement saveButton = driver.findElement(By.cssSelector("button[data-link-action='save-customer']"));
        saveButton.click();

        // Dodanie produktu do koszyka

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("form[class='add-to-cart-or-refresh main-page-add-to-cart-form'] button[class='main-page-add-to-cart-button']"))).click();
        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div [class='cart-content'] div[class='cart-content-btn'] a[class='btn btn-primary']"))).click();
        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[class='checkout cart-detailed-actions js-cart-detailed-actions card-block'] a[class='btn btn-primary']"))).click();
        String cartCount = wait.until(ExpectedConditions.visibilityOfElementLocated(By.cssSelector("div[class='header'] span[class='cart-products-count bold']"))).getText();
        assertEquals("(1)", cartCount, "Nie udalo sie dodac produktu do koszyka");

        // Przejscie do zamowienia produktu z koszyka

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div [id='_desktop_cart'] div[class='header'] a[rel='nofollow']"))).click();
        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[class='checkout cart-detailed-actions js-cart-detailed-actions card-block'] a[class='btn btn-primary']"))).click();

        // Dane adresu

        wait.until(ExpectedConditions.elementToBeClickable(By.id("field-alias"))).sendKeys("alias" + random.nextInt(1000));
        wait.until(ExpectedConditions.elementToBeClickable(By.id("field-firstname"))).sendKeys("Jan");
        wait.until(ExpectedConditions.elementToBeClickable(By.id("field-lastname"))).sendKeys("Kowalski");
        WebElement companyField = wait.until(ExpectedConditions.elementToBeClickable(By.id("field-company")));
        companyField.sendKeys("Januszex " + random.nextInt(100));
        WebElement vatNumberField = wait.until(ExpectedConditions.elementToBeClickable(By.id("field-vat_number")));
        vatNumberField.sendKeys("PL" + random.nextInt(100000000));
        wait.until(ExpectedConditions.elementToBeClickable(By.id("field-address1"))).sendKeys("Jana Pawła II" + " " + random.nextInt(100));
        wait.until(ExpectedConditions.elementToBeClickable(By.id("field-postcode"))).sendKeys("21-370");
        wait.until(ExpectedConditions.elementToBeClickable(By.id("field-city"))).sendKeys("Gdańsk");
        wait.until(ExpectedConditions.elementToBeClickable(By.id("field-phone"))).sendKeys("123456789");
        WebElement useSameAddressCheckbox = driver.findElement(By.id("use_same_address"));
        if (!useSameAddressCheckbox.isSelected()) {
            useSameAddressCheckbox.click();
        }
        wait.until(ExpectedConditions.elementToBeClickable(By.name("confirm-addresses"))).click();

        // Wybranie opcji dostawy

        ((JavascriptExecutor) driver).executeScript("document.getElementById('delivery_option_9').checked = true;");
        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div.content button[name='confirmDeliveryOption']"))).click();

        // Metoda platnosci - platnosc przy odbiorze

        ((JavascriptExecutor) driver).executeScript("document.getElementById('payment-option-2').checked = true;");
        WebElement paymentAgreeCheckbox = driver.findElement(By.id("conditions_to_approve[terms-and-conditions]"));
        if (!paymentAgreeCheckbox.isSelected()) {
            paymentAgreeCheckbox.click();
        }
        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("div[id='payment-confirmation'] div[class='ps-shown-by-js'] button[class='btn btn-primary center-block']"))).click();

        List<WebElement> elements = driver.findElements(By.cssSelector("h3[class='h1 card-title'] i[class='material-icons rtl-no-flip done']"));
        assertFalse(elements.isEmpty(), "Zamówienie nie zostało potwierdzone");

    }

    // 1. Sprawdzenie statusu zamówienia
    // 2. Pobranie faktury VAT
    @Test
    public void getVatInvoice() throws InterruptedException {

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("a[title='Zaloguj się do swojego konta klienta']"))).click();

        WebElement email = wait.until(ExpectedConditions.visibilityOfElementLocated(By.cssSelector("input[id='field-email']")));
        email.sendKeys("jankowalski22@geekup.pl");

        WebElement password = wait.until(ExpectedConditions.visibilityOfElementLocated(By.cssSelector("input[id='field-password']")));
        password.sendKeys("123456789");

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("button[id='submit-login']"))).click();

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("a[id='history-link']"))).click();

        wait.until(ExpectedConditions.elementToBeClickable(By.cssSelector("td[class='text-sm-center hidden-md-down'] a i[class='material-icons']"))).click();
        Thread.sleep(5000);

    }

    @AfterEach
    public void tearDown() {
        if (driver != null) {
            driver.quit();
        }
    }
}
