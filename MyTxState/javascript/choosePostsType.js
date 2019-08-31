/**
 * 
 */

var friendsPostsTabObj = document.getElementById("friendsPostsTab");
friendsPostsTabObj.addEventListener("click", friendsPosts);
function friendsPosts() {

	var postsSection = document.getElementById("postsSection");

	var newPostsContainer = document.createElement("div");
	newPostsContainer.classList.add("postsContainer");

	var newPostsUserPic = document.createElement("img");
	newPostsUserPic.classList.add("postsUserPic");
	newPostsUserPic.src = "/MyTxState/img/profilePic.jpg";
	newPostsUserPic.alt = "profilePic.jpg";

	newPostsContainer.appendChild(newPostsUserPic);

	var newPost = document.createElement("div");
	newPost.classList.add("post");

	newPostsContainer.appendChild(newPost);

	var newPostInfo = document.createElement("div");
	newPostInfo.classList.add("postInfo");

	newPost.appendChild(newPostInfo);

	var newPostUserName = document.createElement("p");
	newPostUserName.classList.add("postUserName");
	var textContent = document.createTextNode("Carla Rodriguez");
	newPostUserName.appendChild(textContent);

	newPostInfo.appendChild(newPostUserName);

	var newPostDate = document.createElement("p");
	newPostDate.classList.add("postDate");
	textContent = document.createTextNode("Date posted: 4/15/19");
	newPostDate.appendChild(textContent);

	newPostInfo.appendChild(newPostDate);

	var newPostTime = document.createElement("p");
	newPostTime.classList.add("postTime");
	textContent = document.createTextNode("12:22pm");
	newPostTime.appendChild(textContent);

	newPostInfo.appendChild(newPostTime);

	var newUserPost = document.createElement("p");
	newUserPost.classList.add("userPost");
	textContent = document.createTextNode("I love this website. I love how I can be aware " +
			"about what's going on around campus. I love how I can see all my classmates and " +
			"communicate with each other. Most importantly, I can connect with my professors" +
			"  and TAs. I love the design and all of its features!");
	newUserPost.appendChild(textContent);
	
	
	newPost.appendChild(newUserPost);
	
	postsSection.appendChild(newPostsContainer);
	
}







