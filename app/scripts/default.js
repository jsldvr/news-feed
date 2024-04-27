class Build {
    constructor(params = []) {
        this.params = params;
    }

    website() {
        this.fetch();
    }

    fetch() {
        // Fetch JSON data and populate the posts element
        fetch('./app/data/posts.json')
            .then(response => response.json())
            .then(posts => {
                this.the_loop(posts);
            })
            .catch(error => {
                console.error('Error fetching JSON:', error);
            });
    }

    the_loop(posts) {
        const postsElement = document.getElementById('posts');
        posts.forEach(post => {

            // <tr> ... </tr>
            const postElement = document.createElement('tr');
            postElement.className = 'post';

            const dateElement = document.createElement('td');
            dateElement.innerHTML = post.pubDate;

            const titleLink = document.createElement('a');
            titleLink.href = post.link;
            titleLink.setAttribute("target","_blank");
            titleLink.textContent = post.title;
            
            const titleElement = document.createElement('div');
            titleElement.classList.add('fw-bold');
            titleElement.appendChild(titleLink);
            
            const descriptionElement = document.createElement('p');
            descriptionElement.innerHTML = post.description;
            
            const linkElement = document.createElement('a');
            linkElement.href = post.link;
            linkElement.setAttribute("target", "_blank");
            linkElement.textContent = 'Read More';
            
            const articleElement = document.createElement("td");
            articleElement.appendChild(titleElement);
            articleElement.appendChild(descriptionElement);
            articleElement.appendChild(linkElement);

            postElement.appendChild(dateElement);
            postElement.appendChild(articleElement);

            postsElement.appendChild(postElement);
        });
    }
}
