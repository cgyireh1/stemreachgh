var threads = [
  {
    id: 1,
    title: "Thread 1",
    author: "User1",
    date: Date.now(),
    content: "Thread content",
    comments: [
      {
        author: "Caro",
        date: Date.now(),
        content: "Hey There"
      },
      {
        author: "Bernice",
        date: Date.now(),
        content: "Hey There buddy, hud today?"
      },
      {
        author: "Irene",
        date: Date.now(),
        content: "Hey There buddy, hud today?"
      },
      {
        author: "Vicky",
        date: Date.now(),
        content: "Are you home now?"
      }
    ]
  },
  {
    id: 2,
    title: "Thread 2",
    author: "User2",
    date: Date.now(),
    content: "Thread content",
    comments: [
      {
        author: "Belinda",
        date: Date.now(),
        content: "Hey There"
      },
      {
        author: "Cynthia",
        date: Date.now(),
        content: "Hey There buddy, hud?"
      }
    ]
  }
]


if (localStorage && localStorage.getItem('threads')) {
  threads = JSON.parse(localStorage.getItem('threads'));
} else {
  threads = defaultThreads;
  localStorage.setItem('threads', JSON.stringify(defaultThreads));
}