// Variables

// Module 1
#define TRIG1 34
#define ECHO1 35

// Module 2
#define TRIG2 36
#define ECHO2 37

// Module 3
#define TRIG3 38
#define ECHO3 39

String product_name1 = "Tide";
String product_name2 = "Breeze";
String product_name3 = "Ariel";

int volume_level1 = 60;
int volume_level2 = 120;
int volume_level3 = 180;
int volume_level4 = 240;

String fabric_name1 = "100% Cotton";
String fabric_name2 = "Polyester";
String fabric_name3 = "Cotton-Polyester Blend";

int laundry_load = 0;

String stain_level1 = "Low";
String stain_level2 = "Medium";
String stain_level3 = "High";

String load_level1 = "Small";
String load_level2 = "Regular";
String load_level3 = "Large";

int option_select = 0;
int selected_option = 0;

int product_select = 0;
int selected_product = 0;
String product_selected = "";

String dispense_select = "";

int fabric_select = 0;
int selected_fabric = 0;
String fabric_selected = "";

int stain_select = 0;
int selected_stain = 0;
String stain_selected = "";

int load_select = 0;
int selected_load = 0;
String load_selected = "";

int volume_select = 0;
int selected_volume = 0;

int amountNeeded = 0;

int admin_select = 0;
int level_select = 0;

// Fan Relay Pin
const int in5Pin = 26;

// Coin Slot Relay Pin
const int in6Pin = 27;

// Coin Slot
const int coinPulsePin = 2;                // Pin connected to coin acceptor pulse
volatile int coinPulseCount = 0;           // Counter for coin pulses
volatile unsigned long lastPulseTime = 0;  // Time of the last pulse
int newCoinInserted = 0;                   // Flag for detecting new coins
int totalCoinsInserted = 0;                // Counter for total coins inserted
const unsigned long debounceDelay = 100;   // Debounce delay in milliseconds

#include <Servo.h>

int paidAmount = 0;

Servo servoMain[2];  // Array to hold 2 servo motors
int led = 13;

int xServo1 = 0;  // Number of movements for servo 1
int xServo2 = 0;  // Number of movements for servo 2

int servo1Counter = 0;
int servo2Counter = 0;

// Dispensing System
const int in1Pin = 11;  // Pump 1 connected to in1
const int in2Pin = 10;  // Pump 2 connected to in2
const int in3Pin = 9;   // Pump 3 connected to in3

// Button
const int buttonPin = 28;
int buttonState = 0;

unsigned long delayTime;

void setup() {
  // Start the serial communication
  Serial.begin(9600);

  digitalWrite(in6Pin, LOW);

  // Coin Slot
  pinMode(in6Pin, OUTPUT);
  digitalWrite(in6Pin, HIGH);

  // Coin Slot
  pinMode(coinPulsePin, INPUT_PULLUP);
  attachInterrupt(digitalPinToInterrupt(coinPulsePin), coinPulseISR, RISING);

  // Peristaltic Pumps
  pinMode(in1Pin, OUTPUT);
  pinMode(in2Pin, OUTPUT);
  pinMode(in3Pin, OUTPUT);

  // Set all pins high initially
  digitalWrite(in1Pin, HIGH);
  digitalWrite(in2Pin, HIGH);
  digitalWrite(in3Pin, HIGH);

  // Servo Motors for Coin Change System
  servoMain[0].attach(48);  // Servo 1 attached to pin 48
  servoMain[1].attach(49);  // Servo 2 attached to pin 49

  // Set initial angles for the servos
  servoMain[0].write(70);   // Set initial angle to servo 1
  servoMain[1].write(130);  // Set initial angle to servo 1

  // Initialize fan pin
  pinMode(in5Pin, OUTPUT);
}

void loop() {
  digitalWrite(in5Pin, LOW);
  welcome();
}

// Welcome
void welcome() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" << LaundroFill >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" Press <L> to Get Started! ");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  while (!Serial.available()) {}

  String userInput = Serial.readStringUntil('\n');
  userInput.toLowerCase();

  if (getUserChoice(userInput)) {
    digitalWrite(in5Pin, HIGH);
    select_mode();
  } else if (userInput == "admin" || userInput == "Admin") {
    admin_screen();
  } else {
    welcome();
  }

  while (Serial.available()) {
    Serial.read();
  }
}

int getUserChoice(String userInput) {
  return (userInput == "L" || userInput == "l") ? 1 : 0;
}

// Select Mode

void select_mode() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" << Select Option>>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" 1. Normal Dispense ");
  Serial.println(" 2. Smart Dispense ");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------ ");

  while (!Serial.available()) {}
  option_select = Serial.parseInt();

  if (option_select == 1) {
    selected_option = 1;
    manual_dispense();
  } else if (option_select == 2) {
    selected_option = 2;
    smart_dispense();
  } else {
    Serial.println(" ------------------------------------------------------------------ ");
    Serial.println(" Select a valid option! ");
    Serial.println(" ------------------------------------------------------------------ ");
    delay(1000);
    select_mode();
  }
}

// Manual Dispense

void manual_dispense() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" << Select Product>>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" 1. " + product_name1);
  Serial.println(" 2. " + product_name2);
  Serial.println(" 3. " + product_name3);
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------ ");
  while (!Serial.available()) {}
  product_select = Serial.parseInt();


  switch (product_select) {
    case 1:
      selected_product = 1;
      product_selected = product_name1;
      break;
    case 2:
      selected_product = 2;
      product_selected = product_name2;
      break;
    case 3:
      selected_product = 3;
      product_selected = product_name3;
      break;
    default:
      Serial.println(" ------------------------------------------------------------------ ");
      Serial.println(" Select a valid option! ");
      Serial.println(" ------------------------------------------------------------------ ");
      delay(1000);
      manual_dispense();
      return;
  }

  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<< Product Selected: " + product_selected + " >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  delay(1000);
  select_volume_manual();
}

void select_volume_manual() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<<<<<< Select Volume: >>>>>>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("1. " + String(volume_level1) + "ml");
  Serial.println("2. " + String(volume_level2) + "ml");
  Serial.println("3. " + String(volume_level3) + "ml");
  Serial.println("4. " + String(volume_level4) + "ml");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  while (!Serial.available()) {}
  volume_select = Serial.parseInt();

  switch (volume_select) {
    case 1:
      selected_volume = volume_level1;
      break;
    case 2:
      selected_volume = volume_level2;
      break;
    case 3:
      selected_volume = volume_level3;
      break;
    case 4:
      selected_volume = volume_level4;
      break;
    default:
      Serial.println(" ------------------------------------------------------------------ ");
      Serial.println(" Select a valid option! ");
      Serial.println(" ------------------------------------------------------------------ ");
      select_volume_manual();
      return;
  }

  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<< " + String(selected_volume) + "ml Selected >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  delay(1000);
  insert_coin_manual();
}

void turn_on_coin_slot() {
  digitalWrite(in6Pin, LOW);  // Turn on the coin slot
}

void insert_coin_manual() {
  turn_on_coin_slot();
  delay(1000);
  product_cost();
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("Product: " + product_selected + "");
  Serial.println("Volume: " + String(selected_volume) + "ml");
  Serial.println("Cost: " + String(amountNeeded) + "");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  totalCoinsInserted = 0;
  coinPulseCount = 0;

  while (amountNeeded > totalCoinsInserted) {
    insert_coin_mechanic();
  }

  if (amountNeeded <= totalCoinsInserted) {
    paidAmount = totalCoinsInserted;
    if (amountNeeded < totalCoinsInserted) {
      transaction_prompt();
    }
    transaction_prompt();
  }
}

void transaction_prompt() {
  digitalWrite(in6Pin, HIGH);  // Turn off the coin slot
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<<<<<< Press <d> to start transaction. >>>>>>");
  Serial.println("<<<<<< Press <c> to cancel transaction. >>>>>>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  while (!Serial.available()) {}
  dispense_select = Serial.readStringUntil('\n');

  if (dispense_select == "d") {
    change_system();
    dispense();
  } else if (dispense_select == "c") {
    int change = totalCoinsInserted;
    Serial.println(" ------------------------------------------------------------------");
    Serial.println(" ");
    Serial.print("Returning: P");
    Serial.println(change);
    Serial.println(" ");
    Serial.println(" ------------------------------------------------------------------");

    xServo1 = change % 5;
    xServo2 = change / 5;

    // Move servo 1 'xServo1' times
    for (int i = 0; i < xServo1; i++) {
      servoMain[0].write(140);  // Set servo 1 angle
      delay(500);               // Wait 500 milliseconds
      servoMain[0].write(70);   // Return servo 1 to initial position
      delay(500);               // Wait 500 milliseconds
    }

    // Move servo 2 'xServo2' times
    for (int i = 0; i < xServo2; i++) {
      servoMain[1].write(70);   // Set servo 2 angle
      delay(500);               // Wait 500 milliseconds
      servoMain[1].write(130);  // Return servo 2 to initial position
      delay(500);               // Wait 500 milliseconds
    }
    reset();
  } else {
    Serial.println(" ------------------------------------------------------------------ ");
    Serial.println(" Select a valid option! ");
    Serial.println(" ------------------------------------------------------------------ ");
    transaction_prompt();
  }
}

// Insert Coin
void insert_coin_mechanic() {
  if (coinPulseCount > 2 && millis() - lastPulseTime > 200) {
    newCoinInserted = coinPulseCount;
    coinPulseCount = 0;                     // Reset coin pulse count
    totalCoinsInserted += newCoinInserted;  // Increment total coins inserted
    Serial.print("Coins Inserted: ");
    Serial.println(totalCoinsInserted);
    delay(500);

    newCoinInserted = 0;
  }
}

void coinPulseISR() {
  unsigned long currentMillis = millis();
  if (currentMillis - lastPulseTime > debounceDelay) {  // Debounce check
    coinPulseCount++;
    lastPulseTime = currentMillis;
  }
}

void change_system() {
  int change = paidAmount - amountNeeded;
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.print("Change: P");
  Serial.println(change);
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  xServo1 = change % 5;
  xServo2 = change / 5;

  // Move servo 1 'xServo1' times
  for (int i = 0; i < xServo1; i++) {
    servoMain[0].write(140);  // Set servo 1 angle
    delay(500);               // Wait 500 milliseconds
    servoMain[0].write(70);   // Return servo 1 to initial position
    delay(500);               // Wait 500 milliseconds
  }

  // Move servo 2 'xServo2' times
  for (int i = 0; i < xServo2; i++) {
    servoMain[1].write(70);   // Set servo 2 angle
    delay(500);               // Wait 500 milliseconds
    servoMain[1].write(130);  // Return servo 2 to initial position
    delay(500);               // Wait 500 milliseconds
  }
}

// Dispensing Screen
void dispense() {
  delay(1000);
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" Dispensing " + String(selected_volume) + "ml of " + String(product_selected) + "");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  // Set the delay time based on selected volume
  switch (selected_volume) {
    case 60:
      delayTime = 5160;
      break;
    case 120:
      delayTime = 10260;
      break;
    case 180:
      delayTime = 15420;
      break;
    case 240:
      delayTime = 20580;
      break;
  }

  // Dispense the product based on selected product
  if (product_selected == product_name1) {
    digitalWrite(in1Pin, LOW);
    delay(delayTime);
    digitalWrite(in1Pin, HIGH);
  } else if (product_selected == product_name2) {
    digitalWrite(in2Pin, LOW);
    delay(delayTime);
    digitalWrite(in2Pin, HIGH);
  } else if (product_selected == product_name3) {
    digitalWrite(in3Pin, LOW);
    delay(delayTime);
    digitalWrite(in3Pin, HIGH);
  }
  Serial.println(" ------------------------------------------------------------------ ");
  Serial.println(" Dispensing Complete! Thank you for using LaundroFill. ");
  Serial.println(" ------------------------------------------------------------------ ");
  delay(1000);
  reset();
}

void product_cost() {
  int cost[4] = { 7, 13, 19, 25 };
  if (selected_volume == 60) {
    amountNeeded = cost[0];
  } else if (selected_volume == 120) {
    amountNeeded = cost[1];
  } else if (selected_volume == 180) {
    amountNeeded = cost[2];
  } else if (selected_volume == 240) {
    amountNeeded = cost[3];
  }
}

// Admin
void admin_screen() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" << Admin Settings >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" 1. Liquid Detergent Level Monitoring");
  Serial.println(" 2. Product Value Editor");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------ ");
  while (!Serial.available()) {}
  admin_select = Serial.parseInt();

  switch (admin_select) {
    case 1:
      admin_level_monitoring();
      break;
    case 2:
      admin_value_edit();
      break;
    default:
      Serial.println(" ------------------------------------------------------------------ ");
      Serial.println(" Select a valid option! ");
      Serial.println(" ------------------------------------------------------------------ ");
      delay(1000);
      admin_screen();
      return;
  }
  delay(1000);
}

void admin_level_monitoring() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" Liquid Detergent Level Monitoring ");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" 1. Check " + String(product_name1) + " Level");
  Serial.println(" 2. Check " + String(product_name2) + " Level");
  Serial.println(" 3. Check " + String(product_name3) + " Level");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  while (!Serial.available()) {}
  level_select = Serial.parseInt();

  switch (level_select) {
    case 1:
      displayModule1Results();
      admin_level_monitoring();
      break;
    case 2:
      displayModule2Results();
      admin_level_monitoring();
      break;
    case 3:
      displayModule3Results();
      admin_level_monitoring();
      break;
    default:
      Serial.println(" ------------------------------------------------------------------ ");
      Serial.println(" Select a valid option! ");
      Serial.println(" ------------------------------------------------------------------ ");
      delay(1000);
      admin_level_monitoring();
      return;
  }
}


void displayModule1Results() {
  digitalWrite(TRIG1, LOW);  // Set the trigger pin to low for 2uS
  delayMicroseconds(2);
  digitalWrite(TRIG1, HIGH);  // Send a 10uS high to trigger ranging
  delayMicroseconds(20);
  digitalWrite(TRIG1, LOW);                     // Send pin low again
  int distance1 = pulseIn(ECHO1, HIGH, 26000);  // Read in times pulse
  distance1 = distance1 / 58;                   // Convert the pulse duration to distance

  Serial.print("Distance 1: ");
  Serial.println(String(distance1) + "cm");

  if (distance1 >= 21 && distance1 <= 25) {
    Serial.println("Warning: Low Volume Liquid Detergent - Module 1");
  } else if (distance1 >= 26 && distance1 <= 30) {
    Serial.println("Warning: Empty Liquid Detergent - Module 1");
  }

  delay(500);
}

void displayModule2Results() {
  digitalWrite(TRIG2, LOW);  // Set the trigger pin to low for 2uS
  delayMicroseconds(2);
  digitalWrite(TRIG2, HIGH);  // Send a 10uS high to trigger ranging
  delayMicroseconds(20);
  digitalWrite(TRIG2, LOW);                     // Send pin low again
  int distance2 = pulseIn(ECHO2, HIGH, 26000);  // Read in times pulse
  distance2 = distance2 / 58;

  Serial.print("Distance 2: ");
  Serial.println(String(distance2) + "cm");

  if (distance2 >= 21 && distance2 <= 25) {
    Serial.println("Warning: Low Volume Liquid Detergent - Module 2");
  } else if (distance2 >= 26 && distance2 <= 30) {
    Serial.println("Warning: Empty Liquid Detergent - Module 2");
  }
}

void displayModule3Results() {
  digitalWrite(TRIG3, LOW);  // Set the trigger pin to low for 2uS
  delayMicroseconds(2);
  digitalWrite(TRIG3, HIGH);  // Send a 10uS high to trigger ranging
  delayMicroseconds(20);
  digitalWrite(TRIG3, LOW);                     // Send pin low again
  int distance3 = pulseIn(ECHO3, HIGH, 26000);  // Read in times pulse
  distance3 = distance3 / 58;                   // Convert the pulse duration to distance

  Serial.print("Distance 3: ");
  Serial.println(String(distance3) + "cm");

  if (distance3 >= 21 && distance3 <= 25) {
    Serial.println("Warning: Low Volume Liquid Detergent - Module 3");
  } else if (distance3 >= 26 && distance3 <= 30) {
    Serial.println("Warning: Empty Liquid Detergent - Module 3");
  }
  delay(500);
}

void admin_value_edit() {
}

// Close
void close() {
  if (Serial.available()) {
    char userInput = Serial.read();
    if (userInput == 'x' || userInput == 'X') {
      Serial.println(" ------------------------------------------------------------------");
      Serial.println("");
      Serial.println(" Terminating... ");
      Serial.println("");
      Serial.println(" ------------------------------------------------------------------");
      delay(1000);
      digitalWrite(in6Pin, HIGH);
      return;
    }
  }
}

// Reset
void reset() {
  option_select = 0;
  selected_option = 0;

  product_select = 0;
  selected_product = 0;
  product_selected = "";

  volume_select = 0;
  selected_volume = 0;

  coinPulseCount = 0;
  lastPulseTime = 0;
  newCoinInserted = 0;
  totalCoinsInserted = 0;

  amountNeeded = 0;
  paidAmount = 0;

  loop();
}

// Smart Dispense
void smart_dispense() {
  select_load();
}

void select_load() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" << Enter Laundry Load:  >>");
  Serial.println(" ------------------------------------------------------------------ ");

  while (!Serial.available()) {}
  laundry_load = Serial.parseInt();

  if (laundry_load == 0) {
    Serial.println(" ------------------------------------------------------------------ ");
    Serial.println(" Laundry Load cannot be 0kg! ");
    Serial.println(" ------------------------------------------------------------------ ");
    delay(1000);
    select_load();
  } else if (laundry_load > 8) {
    Serial.println(" ------------------------------------------------------------------ ");
    Serial.println(" Laundry Load cannot exceed 8kg! ");
    Serial.println(" ------------------------------------------------------------------ ");
    delay(1000);
    select_load();
  } else {
    Serial.println(" ------------------------------------------------------------------");
    Serial.println(" ");
    Serial.println("<< Laundry Load: " + String(laundry_load) + "kg >>");
    Serial.println(" ");
    Serial.println(" ------------------------------------------------------------------");
    delay(1000);
    select_fabric();
  }
}

void select_fabric() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" << Enter Type of Fabric >>");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" 1. " + fabric_name1);
  Serial.println(" 2. " + fabric_name2);
  Serial.println(" 3. " + fabric_name3);
  Serial.println(" ------------------------------------------------------------------ ");

  while (!Serial.available()) {}
  fabric_select = Serial.parseInt();

  switch (fabric_select) {
    case 1:
      selected_fabric = 1;
      fabric_selected = fabric_name1;
      break;
    case 2:
      selected_fabric = 2;
      fabric_selected = fabric_name2;
      break;
    case 3:
      selected_fabric = 3;
      fabric_selected = fabric_name3;
      break;
    default:
      select_fabric();
      return;
  }

  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<< Fabric Selected: " + fabric_selected + " >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  delay(1000);
  select_stain();
}

void select_stain() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" << Enter Level of Stain >>");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" 1. " + stain_level1);
  Serial.println(" 2. " + stain_level2);
  Serial.println(" 3. " + stain_level3);
  Serial.println(" ------------------------------------------------------------------ ");

  while (!Serial.available()) {}
  stain_select = Serial.parseInt();


  switch (stain_select) {
    case 1:
      stain_select = 1;
      stain_selected = stain_level1;
      break;
    case 2:
      stain_select = 2;
      stain_selected = stain_level2;
      break;
    case 3:
      stain_select = 3;
      stain_selected = stain_level3;
      break;
    default:
      select_stain();
      return;
  }

  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<< Stain Level Selected: " + stain_selected + " >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  delay(1000);
  select_volume_smart();
}

void select_volume_smart() {
  if (stain_selected == stain_level1) {
    selected_volume = volume_level1;
    Serial.println(" ------------------------------------------------------------------");
    Serial.println(" ");
    Serial.println("The recommended volume is:  " + String(volume_level1) + "ml");
    Serial.println(" ");
    Serial.println(" ------------------------------------------------------------------");
  } else if (stain_selected == stain_level2) {
    selected_volume = volume_level2;
    Serial.println(" ------------------------------------------------------------------");
    Serial.println(" ");
    Serial.println("The recommended volume is:  " + String(volume_level2) + "ml");
    Serial.println(" ");
    Serial.println(" ------------------------------------------------------------------");
  } else if (stain_selected == stain_level3) {
    selected_volume = volume_level3;
    Serial.println(" ");
    Serial.println("The recommended volume is:  " + String(volume_level3) + "ml");
    Serial.println(" ");
    Serial.println(" ------------------------------------------------------------------");
  } else {
    Serial.println(" ------------------------------------------------------------------ ");
    Serial.println(" Select a valid option! ");
    Serial.println(" ------------------------------------------------------------------ ");
    select_volume_smart();
    return;
  }

  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<< Would you like to proceed? >>");
  Serial.println(" ");
  Serial.println("<< Press <y> if yes. >>");
  Serial.println("<< Press <n> to select the volume manually. >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  while (!Serial.available()) {}
  dispense_select = Serial.readStringUntil('\n');

  if (dispense_select == "y") {
    select_product_smart();
  } else if (dispense_select == "n") {
    no_select_volume_smart();
  } else {
    Serial.println(" ------------------------------------------------------------------ ");
    Serial.println(" Select a valid option! ");
    Serial.println(" ------------------------------------------------------------------ ");
    delay(1000);
    select_volume_smart();
  }
}


void select_product_smart() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" << Select Product>>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println(" 1. " + product_name1);
  Serial.println(" 2. " + product_name2);
  Serial.println(" 3. " + product_name3);
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------ ");
  while (!Serial.available()) {}
  product_select = Serial.parseInt();


  switch (product_select) {
    case 1:
      selected_product = 1;
      product_selected = product_name1;
      break;
    case 2:
      selected_product = 2;
      product_selected = product_name2;
      break;
    case 3:
      selected_product = 3;
      product_selected = product_name3;
      break;
    default:
      Serial.println(" ------------------------------------------------------------------ ");
      Serial.println(" Select a valid option! ");
      Serial.println(" ------------------------------------------------------------------ ");
      delay(1000);
      select_product_smart();
      return;
  }

  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<< Product Selected: " + product_selected + " >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  delay(1000);
  insert_coin_smart();
}

void no_select_volume_smart() {
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<<<<<< Select Volume: >>>>>>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("1. " + String(volume_level1) + "ml");
  Serial.println("2. " + String(volume_level2) + "ml");
  Serial.println("3. " + String(volume_level3) + "ml");
  Serial.println("4. " + String(volume_level4) + "ml");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  while (!Serial.available()) {}
  volume_select = Serial.parseInt();

  switch (volume_select) {
    case 1:
      selected_volume = volume_level1;
      break;
    case 2:
      selected_volume = volume_level2;
      break;
    case 3:
      selected_volume = volume_level3;
      break;
    case 4:
      selected_volume = volume_level4;
      break;
    default:
      Serial.println(" ------------------------------------------------------------------ ");
      Serial.println(" Select a valid option! ");
      Serial.println(" ------------------------------------------------------------------ ");
      no_select_volume_smart();
      return;
  }

  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("<< " + String(selected_volume) + "ml Selected >>");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");
  delay(1000);
  select_product_smart();
}

void insert_coin_smart() {
  turn_on_coin_slot();
  delay(1000);
  product_cost();
  Serial.println(" ------------------------------------------------------------------");
  Serial.println(" ");
  Serial.println("Fabric: " + fabric_selected + "");
  Serial.println("Stain: " + stain_selected + "");
  Serial.println("Product: " + product_selected + "");
  Serial.println("Volume: " + String(selected_volume) + "ml");
  Serial.println("Cost: " + String(amountNeeded) + "");
  Serial.println(" ");
  Serial.println(" ------------------------------------------------------------------");

  totalCoinsInserted = 0;
  coinPulseCount = 0;

  while (amountNeeded > totalCoinsInserted) {
    insert_coin_mechanic();
  }

  if (amountNeeded <= totalCoinsInserted) {
    paidAmount = totalCoinsInserted;
    if (amountNeeded < totalCoinsInserted) {
      transaction_prompt();
    }
    transaction_prompt();
  }
}
