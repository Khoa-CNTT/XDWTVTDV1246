<div class="comments-container">
    <h2>Đánh Giá</h2>

    <div class="comment">
      <div class="avatar">AN</div>
      <div class="comment-body">
        <div class="comment-header">
          <div class="comment-author">Anh Hoàng</div>
          <div class="comment-time">2 giờ trước</div>
        </div>
        <div class="comment-text">
          Chất lượng phục vụ rất tốt. Rất vui khi được chia sẻ với mọi người!
        </div>
      </div>
    </div>

    <div class="comment">
      <div class="avatar">LT</div>
      <div class="comment-body">
        <div class="comment-header">
          <div class="comment-author">Nữ Khánh</div>
          <div class="comment-time">1 giờ trước</div>
        </div>
        <div class="comment-text">
          Dịch vụ rất tốt, nhân viên thân thiện và nhiệt tình. Tôi đã có một kỳ nghỉ tuyệt vời tại đây!
        </div>
      </div>
    </div>
  </div>

<div style="margin: 50px 0 200px 0;">

</div>
    <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f8;
      margin: 20px;
      color: #333;
    }
    .comments-container {
      max-width: 90%;
      margin: 0 auto;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 20px;
    }
    .comment {
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
      display: flex;
      gap: 15px;
    }
    .comment:last-child {
      border-bottom: none;
    }
    .avatar {
      width: 50px;
      height: 50px;
      background: #bbb;
      border-radius: 50%;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      font-size: 18px;
      text-transform: uppercase;
      user-select: none;
    }
    .comment-body {
      flex-grow: 1;
    }
    .comment-header {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      color: #555;
      margin-bottom: 6px;
    }
    .comment-author {
      font-weight: bold;
    }
    .comment-time {
      font-style: italic;
      color: #999;
    }
    .comment-text {
      font-size: 15px;
      line-height: 1.4;
    }

    /* Comment form */
    .comment-form {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .comment-form textarea {
      resize: vertical;
      min-height: 80px;
      padding: 10px;
      font-size: 14px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-family: inherit;
    }
    .comment-form input[type="text"] {
      padding: 8px 10px;
      font-size: 14px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-family: inherit;
    }
    .comment-form button {
      width: 120px;
      align-self: flex-end;
      padding: 10px;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .comment-form button:hover {
      background-color: #0056b3;
    }

  </style>