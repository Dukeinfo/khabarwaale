self.addEventListener("push", (event) => {
    notification = event.data.json();
    event.waitUntil(self.registration.showNotification(notification.title , {
        image: notification.image,
        body: notification.body ,
        icon: "icon.png" ,
        data: {
            notifURL: notification.url
        },
        actions: [
            { action: 'close', title: 'Close' }
        ]
    }));
});

// self.addEventListener("notificationclick",  (event) => {
// event.waitUntil(clients.openWindow(event.notification.data.notifURL));
// });
// Close 
self.addEventListener("notificationclick", (event) => {
    const clickedNotification = event.notification;
    const action = event.action;

    if (action === 'close') {
        // Close the notification if the 'close' action is performed   
        clickedNotification.close();
    } else {
        // Open a new window with the specified URL when the notification is clicked
        event.waitUntil(
            clients.openWindow(clickedNotification.data.notifURL)
        );
    }
});


// self.addEventListener("push", (event) => {
//     const notification = event.data.json();

//     // Ensure there's a default URL or handle it based on your requirements
//     const defaultUrl = "/";  // Replace with your default URL

//     event.waitUntil(
//         self.registration.showNotification(notification.title, {
//             body: notification.body,
//             icon: "icon.png",
//             data: {
//                 notifURL:  defaultUrl,
//             },
//         })
//     );
// });

// self.addEventListener("notificationclick", (event) => {
//     event.waitUntil(clients.openWindow(event.notification.data.notifURL));
// });