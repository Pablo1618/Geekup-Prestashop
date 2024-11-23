// Define the global queue array if it doesn't already exist
window.montonioLoadQueue = window.montonioLoadQueue || [];

// Define the subscriber function that will consume the queue
function MontonioLoadQueueSubscriber() {
    var queue = window.montonioLoadQueue;
    var running = false;
    var stop = false;
    var autoRun = false;

    // Clear the queue
    this.clear = function () {
        queue.length = 0;
    };

    // Get the queue
    this.contents = function () {
        return queue;
    };

    // Set the queue
    this.setQueue = function (val) {
        queue.length = 0;
        Array.prototype.push.apply(queue, val);
    };

    // Run the next item in the queue
    this.next = function () {
        running = true;
        if (queue.length < 1 || stop) {
            running = false;
            return;
        }

        var nextItem = queue.shift();
        nextItem();
        if (queue.length > 0) {
            this.next();
        } else {
            running = false;
        }
    };

    // Start consuming the queue if autoRun is true
    this.init = function (autoRunFlag) {
        autoRun = autoRunFlag;
        if (autoRun && !running) {
            this.next();
        }
    };

    // Set autoRun flag
    this.setAutoRun = function (flag) {
        autoRun = flag;
    };

    // Stop or start the queue processing
    this.setStop = function (flag) {
        stop = flag;
    };

    // Automatically start consuming the queue if it has items
    if (queue.length > 0 && !running && autoRun) {
        this.next();
    }

    // Use MutationObserver to detect changes in the queue
    var observer = new MutationObserver(function (mutations) {
        if (!running && autoRun && queue.length > 0) {
            this.next();
        }
    }.bind(this));

    observer.observe(document.documentElement, {
        childList: true,
        subtree: true,
        attributes: true
    });

    // Automatically start consuming the queue if it has items
    if (queue.length > 0 && !running && autoRun) {
        this.next();
    }
}

// Set window.onMontonioLoaded to the initialization function
window.onMontonioLoaded = function() {
    window.montonioLoadQueueSubscriber = new MontonioLoadQueueSubscriber();
    window.montonioLoadQueueSubscriber.init(true);
};

function montonioToggleSpinnerOverlay(shouldShow) {
    if (shouldShow) {
        var overlay = document.createElement('div');
        overlay.id = 'montonio-spinner-overlay';

        // Create a spinner
        var spinner = document.createElement('div');
        spinner.id = 'montonio-spinner';
        overlay.appendChild(spinner);

        // Add the overlay to the body
        document.body.appendChild(overlay);
    } else {
        var overlay = document.getElementById('montonio-spinner-overlay');
        overlay.remove();
    }
}

// Function to add the class to the parent of the montonio input
function addClassToParentOfMontonioInputs() {
    var montonioInputs = document.querySelectorAll('input[data-module-name="montonio"]');

    for (var i = 0; i < montonioInputs.length; i++) {
        if (montonioInputs[i].parentNode) {
            montonioInputs[i].parentNode.classList.add('montonio-payment-method');
        }
    }
}

// Debounce function to limit how often addClassToParentOfMontonioInputs is called
function montonioDebounce(func, delay) {
    var timeout;
    return function() {
        var context = this, args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            func.apply(context, args);
        }, delay);
    };
}

// Debounced version of the addClassToParentOfMontonioInputs function
var debouncedAddClassToParentOfMontonioInputs = montonioDebounce(addClassToParentOfMontonioInputs, 100);

// Create a MutationObserver to watch for any changes in the DOM
var montonioSupercheckoutObserver = new MutationObserver(function(mutations) {
    var relevantMutation = false;

    for (var i = 0; i < mutations.length; i++) {
        var mutation = mutations[i];

        // If nodes are added or attributes changed, we consider it a relevant mutation
        if (mutation.addedNodes && mutation.addedNodes.length > 0) {
            relevantMutation = true;
            break;
        }
        if (mutation.type === 'attributes' && mutation.target.tagName === 'INPUT' && mutation.target.getAttribute('data-module-name') === 'montonio') {
            relevantMutation = true;
            break;
        }
    }

    // Call the debounced function only if there was a relevant mutation
    if (relevantMutation) {
        debouncedAddClassToParentOfMontonioInputs();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Run the function initially for any existing montonio inputs
    addClassToParentOfMontonioInputs();
  
    // Configuration for the observer (we want to observe the child list and attribute changes)
    var montonioSupercheckoutObserverConfig = { childList: true, subtree: true, attributes: true };
    
    // Start observing the document for changes
    montonioSupercheckoutObserver.observe(document.body, montonioSupercheckoutObserverConfig);
});
