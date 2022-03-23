class captcha {
    cols=3 // How many colomns
    rows=3 // How many rows
    count // cols*rows
    blocks // The html elements with className="captcha_block"
    emptyBlockCoords=[2,2] // The coordinates of the empty block
    indexes=[] // Keeps track of the order of the blocks

    constructor() {
        this.count = this.cols * this.rows
        this.blocks = document.getElementsByClassName("captcha_block") // Grab the blocks
        this.init()
    }

    init() { // Position each block in its proper position
        for (let y = 0; y < this.rows; y++) {
            for (let x = 0; x < this.cols; x++) {
                let blockIdx = x + y*this.cols
                if (blockIdx+1 >= this.count) break
                let block = this.blocks[blockIdx]
                this.positionBlockAtCoord(blockIdx,x,y)
                block.addEventListener('click', () => this.onClickOnBlock(blockIdx))
                this.indexes.push(blockIdx)
            }
        }
        this.indexes.push(this.count-1)
        // Randomize the blocs 9 times (So the captcha is easy, the player will have to move between 1 and 9 blocks.)
        this.randomize(9)
    }

    randomize(iterationCount) { // Move a random block (x iterationCount)
        for (let i = 0; i < iterationCount; i++) {
            let randomBlockIdx = Math.floor(Math.random() * (this.count-1))
            let moved = this.moveBlock(randomBlockIdx)
            if (!moved) i--
        }
    }

    moveBlock(blockIdx) { // Moves a block and return true if the block has moved
        let block = this.blocks[blockIdx]
        let blockCoords = this.canMoveBlock(block)
        if (blockCoords != null) {
            this.positionBlockAtCoord(blockIdx, this.emptyBlockCoords[0], this.emptyBlockCoords[1])
            this.indexes[this.emptyBlockCoords[0] + this.emptyBlockCoords[1]*this.cols] = (
                this.indexes[blockCoords[0] + blockCoords[1]*this.cols]
            )
            this.emptyBlockCoords[0] = blockCoords[0]
            this.emptyBlockCoords[1] = blockCoords[1]
            return true;
        }
        return false;
    }

    canMoveBlock(block) { // Return the block coordinates if he can move else return null
        let blockPos = [parseInt(block.style.left),parseInt(block.style.top)]
        let blockWidth = block.clientWidth
        let blockCoords = [blockPos[0]/blockWidth, blockPos[1]/blockWidth]
        let diff = [Math.abs(blockCoords[0] - this.emptyBlockCoords[0]), Math.abs(blockCoords[1] - this.emptyBlockCoords[1])]
        let canMove = (diff[0]==1 && diff[1]==0) || (diff[0]==0 && diff[1]==1)
        if (canMove) return blockCoords
        else return null
    }

    positionBlockAtCoord(blockIdx, x, y) { // Position the block at a certain coordinates
        let block = this.blocks[blockIdx]
        block.style.left = (x*block.clientWidth) + "px"
        block.style.top = (y*block.clientWidth) + "px"
    }

    onClickOnBlock(blockIdx) { // Try move block and check if captcha was solved
        if (this.moveBlock(blockIdx)) {
            if (this.checkCaptchaSolved()) {
                document.cookie += captchaSolved = true; expires = time() + 1800
            }
        }
    }

    checkCaptchaSolved() { // Return if Captcha was solved
        for (let i  =0; i < this.indexes.length; i++){
            if (i==this.emptyBlockCoords[0] + this.emptyBlockCoords[1]*this.cols) continue
            if (this.indexes[i] != i) return false
        }
        return true
    }

}


let newCaptcha = new captcha //For create a new captcha and lauch the script with constructor()

// Re-mix the images
let reset_button = document.querySelector(".reset_button")
reset_button.addEventListener('click', () => {
    location.reload();
})
