self.addEventListener("push", (event) => {

    notification = event.data.json();
    event.waitUntil(self.registration.showNotification(notification.title , {
        body: notification.body ,
        icon: "icon.png" ,
        data: {
            notifURL: notification.url
        }
    }));
});

self.addEventListener("notificationclick",  (event) => {

event.waitUntil(clients.openWindow(event.notification.data.notifURL));

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